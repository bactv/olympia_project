<?php

namespace backend\controllers;

use backend\models\AdminAction;
use Yii;
use backend\models\AdminGroup;
use common\models\search\AdminGroupSearch;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * AdminGroupController implements the CRUD actions for AdminGroup model.
 */
class AdminGroupController extends BackendController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdminGroup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdminGroup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AdminGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdminGroup();

        $request = Yii::$app->request->post();

        if ($model->load($request)) {
            $action_ids = $request['action_ids'];   // get post action_ids
            $data_insert = $this->getPermissionDataInsert($action_ids);
            $model->permissions = json_encode($data_insert);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AdminGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $permission = json_decode($model->permissions);
        $action_ids = [];
        foreach ($permission as $arr) {
            foreach ($arr->actions as $action) {
                $action_ids[] = $action;
            }
        }

        $request = Yii::$app->request->post();
        if ($model->load($request)) {
            $action_ids = $request['action_ids'];   // get post action_ids
            $data_insert = $this->getPermissionDataInsert($action_ids);
            $model->permissions = json_encode($data_insert);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'action_ids' => $action_ids
            ]);
        }
    }

    /**
     * Deletes an existing AdminGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->deleted = 1;
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Change status
     * @throws NotFoundHttpException
     * @throws \yii\base\ExitException
     */
    public function actionChangeStatus()
    {
        if (!Yii::$app->getRequest()->isAjax)
            Yii::$app->end();

        $id = (int)ArrayHelper::getValue($_REQUEST, 'id', 0);
        $status = (int)ArrayHelper::getValue($_REQUEST, 'status', 0);
        $statusChange = ($status == 1) ? 0 : 1;

        $model = $this->findModel($id);
        if ($model instanceof AdminGroup) {
            $updateStatus = $model->updateAttributes(['id' => $id, 'status' => $statusChange]);
            if ($updateStatus) {
                echo Json::encode(['status' => true]);
                Yii::$app->end();
            } else {
                echo Json::encode(['status' => false]);
                Yii::$app->end();
            }
        } else {
            echo Json::encode(['status' => false]);
            Yii::$app->end();
        }
    }

    /**
     * Finds the AdminGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdminGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function getPermissionDataInsert($action_ids)
    {
        // Get Unique controller by post action_ids
        $arr_controller_ids = [];
        foreach ($action_ids as $id) {
            $controller_id = AdminAction::find()->where(['id' => $id])->one()->controller_id;
            $arr_controller_ids[] = $controller_id;
        }
        $arr_controller_ids = array_unique($arr_controller_ids);


        $data_insert = [];
        foreach ($arr_controller_ids as $controller_id) {
            $arr_action_ids_db = [];
            $allActions = AdminAction::find()->select(['id'])->where(['controller_id' => $controller_id])->all();
            foreach ($allActions as $action) {
                $arr_action_ids_db[] = $action->id;
            }

            $arr_action_ids_insert = array_intersect($arr_action_ids_db, $action_ids); // Intersect action_ids post and action_ids in db

            array_push($data_insert, [
                'controller_id' => $controller_id,
                'actions' => $arr_action_ids_insert
            ]);
        }

        return $data_insert;
    }
}
