<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 28/08/2016
 * Time: 3:50 CH
 */
namespace backend\controllers;
use backend\components\BackendController;
use backend\models\AdminAction;
use backend\models\AdminController;
use Yii;
use yii\helpers\Json;

class RouterPermissionController extends BackendController
{
    public function actionUpdateRouter()
    {
        // Get controller in folder
        $arr_controller = [];
        $listControllers = glob(Yii::getAlias('@backend') . '/controllers' . '/*Controller.php');
        if (!empty($listControllers)) {
            foreach ($listControllers as $controller) {
                $class = substr(basename($controller, ".php"), 0, -10);
                if (!in_array($class, Yii::$app->params['controller_except'])) {
                    array_push($arr_controller, $class);
                }
            }

        }

        // Get controller from DB
        $arr_controllerDB = [];
        $listControllersDB = AdminController::find()->all();
        if (!empty($listControllersDB)) {
            foreach ($listControllersDB as $con) {
                $arr_controllerDB[] = $con->controller;
            }
        }

        // Insert or update
        $listUpdateController = array_diff($arr_controller, $arr_controllerDB);
        if (!empty($listUpdateController)) {
            foreach ($listUpdateController as $item) {
                $model_controller = new AdminController();
                $model_controller->controller = $item;
                $model_controller->save();
            }
        }

        // Delete
        $listDeleteController = array_diff($arr_controllerDB, $arr_controller);
        if (!empty($listDeleteController)) {
            foreach ($listDeleteController as $item) {
                $model_controller = AdminController::find()->where(['controller' => $item])->one();
                $actions = AdminAction::find()->where(['controller_id' => $model_controller->id])->all();
                if (!empty($actions)) {
                    foreach ($actions as $at) {
                        $at->delete();
                    }
                }
                $model_controller->delete();
            }
        }

        /*-------------------------- Action ------------------------------*/
        $listActionController = AdminController::find()->all();

        if (!empty($listActionController)) {
            foreach ($listActionController as $controller) {
                $controllerName = $controller->controller . 'Controller';
                $className = "backend\\controllers\\{$controllerName}";

                if (class_exists($className)) {
                    $obj = new $className($controllerName, null);
                    $methods = get_class_methods($obj);

                    $arrActionFile = [];
                    foreach ($methods as $method) {
                        if ($method != 'actions' && preg_match('/^action/', $method)) {
                            $methodName = substr($method, 6);
                            $arrActionFile[] = $methodName;
                        }
                    }
                    $arrActionDB = [];
                    $listActionDB = AdminAction::find()->where(['controller_id' => $controller->id])->all();
                    if (!empty($listActionDB)) {
                        foreach ($listActionDB as $at) {
                            $arrActionDB[] = $at->action;
                        }
                    }

                    // Insert Or Update
                    $listActionUpdate = array_diff($arrActionFile, $arrActionDB);
                    foreach ($listActionUpdate as $at) {
                        $model = new AdminAction();
                        $model->action = $at;
                        $model->controller_id = $controller->id;
                        $model->save();
                    }

                    // Delete
                    $listActionDelete = array_diff($arrActionDB, $arrActionFile);
                    foreach ($listActionDelete as $at) {
                        $model = AdminAction::find()->where(['controller_id' => $controller->id, 'action' => $at])->one();
                        if (!empty($model)) {
                            $model->delete();
                        }
                    }
                }
            }
        }
    }
}