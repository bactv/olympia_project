<?php

namespace backend\controllers;

use backend\models\Answer;
use Yii;
use backend\models\Question;
use common\models\search\QuestionSearch;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends BackendController
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
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
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
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();
        $request = Yii::$app->request->post();

        if ($model->load($request)) {
            $answers = $request['Question']['answer'];
            $true = isset($request['ans']) ? $request['ans'] : "";
            $model->admin = 1;
            $model->save();

            foreach ($answers as $answer) {
                $ans = new Answer();
                $ans->question_id = $model->id;
                $ans->content = $answer;
                if ($answer === $true) {
                    $ans->true = 1;
                }
                $ans->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $answers = Answer::getAnswersByQuestionId($id);
        $request = Yii::$app->request->post();

        if ($model->load($request)) {
            $list_answers = $request['Question']['answer'];
            $true = isset($request['ans']) ? $request['ans'] : "";
            $model->save();

            foreach ($answers as $ans) {
                $ans->delete();
            }
            foreach ($list_answers as $answer) {
                $ans = new Answer();
                $ans->question_id = $model->id;
                $ans->content = $answer;
                if ($answer === $true) {
                    $ans->true = 1;
                }
                $ans->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'answers' => $answers
            ]);
        }
    }

    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();
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
        if ($model instanceof Question) {
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
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
