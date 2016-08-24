<?php

namespace backend\controllers;

use Yii;
use backend\models\CategoryMenu;
use common\models\CategoryMenuSearch;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryMenuController implements the CRUD actions for CategoryMenu model.
 */
class CategoryMenuController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CategoryMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryMenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CategoryMenu model.
     * @param integer $id
     * @param integer $module_id
     * @return mixed
     */
    public function actionView($id, $module_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $module_id),
        ]);
    }

    /**
     * Creates a new CategoryMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'module_id' => $model->module_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CategoryMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $module_id
     * @return mixed
     */
    public function actionUpdate($id, $module_id)
    {
        $model = $this->findModel($id, $module_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'module_id' => $model->module_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $module_id
     * @return mixed
     */
    public function actionDelete($id, $module_id)
    {
        $this->findModel($id, $module_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CategoryMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $module_id
     * @return CategoryMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $module_id)
    {
        if (($model = CategoryMenu::findOne(['id' => $id, 'module_id' => $module_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
