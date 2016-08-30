<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 24/08/2016
 * Time: 12:33 SA
 */
namespace backend\components;
use backend\models\Admin;
use backend\models\AdminController;
use backend\models\AdminAction;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class BackendController extends Controller
{
    public function beforeAction($action)
    {
//        $user_id = Yii::$app->user->id;
//        $controller_name = Yii::$app->controller->id;
//        $action_name = Yii::$app->controller->action->id;
//
//        $controller_id = AdminController::find()->where(['controller' => $this->parseController($controller_name)])->one()->id;
//        $action_id = AdminAction::find()->where(['controller_id' => $controller_id, 'action' => $this->parseController($action_name)])->one()->id;
//
//        if (Yii::$app->user->isGuest) {
//            return $this->redirect(Yii::$app->urlManager->createUrl(['default/login']));
//        } else if (CheckPermission::checkPermission($user_id, $controller_id, $action_id)) {
//            $model = Admin::find()->where(['id' => $user_id])->one();
//            $model->last_active_time = date('Y-m-d H:i:s');
//            $model->save();
//            return true;
//        } else {
//            throw new ForbiddenHttpException('Sorry, you don\'t have permission to access [directory] on this server.');
//        }
        return true;
    }

    private function parseController($string)
    {
        $arr_characters = [];
        for ($i = 0; $i < strlen($string); $i++) {
            $arr_characters[] = $string[$i];
        }
        for ($i = 0; $i < count($arr_characters); $i++) {
            if ($arr_characters[$i] == '-') {
                $arr_characters[$i+1] = strtoupper($arr_characters[$i+1]);
                $arr_characters[$i] = '';
            }
        }
        $str = ucfirst(implode('', $arr_characters));
        return $str;
    }
}