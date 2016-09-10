<?php

namespace backend\controllers;

use backend\models\PartGame;
use backend\models\Question;
use Yii;
use backend\models\QuestionPackage;
use common\models\search\QuestionPackageSearch;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * QuestionPackageController implements the CRUD actions for QuestionPackage model.
 */
class QuestionPackageController extends BackendController
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
     * Lists all QuestionPackage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionPackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single QuestionPackage model.
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
     * Creates a new QuestionPackage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuestionPackage();
        $request = Yii::$app->request->post();

        if ($model->load($request)) {
//            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing QuestionPackage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing QuestionPackage model.
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
        if ($model instanceof QuestionPackage) {
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

    public function actionChooseQuestionsPackage()
    {
        $part_game_id = intval(Yii::$app->request->post('part_game'));

        $part_game = PartGame::getPartGameById($part_game_id);
        $params['number_question'] = $part_game->number_question;
        $questions = QuestionPackage::chooseQuestion($params);

        if (count($questions) < $part_game->number_question) {
            return "Không đủ số câu hỏi";
        }
        return $this->renderAjax('list-questions', compact('questions', 'part_game'));
    }

    public function actionChangeQuestion()
    {
        $question_id = intval(Yii::$app->request->post('question_id'));
        $question = Question::find()->where(['id' => $question_id])->one();
        return $this->renderAjax('choose-question', compact('question'));
    }

    public function actionObstacleRace()
    {
        return $this->renderAjax('obstacle-race');
    }

    /**
     * Finds the QuestionPackage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuestionPackage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuestionPackage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
