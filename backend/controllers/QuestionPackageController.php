<?php

namespace backend\controllers;

use backend\models\Answer;
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
            $question_ids = $request['question_ids'];
            foreach ($question_ids as $id) {
                $qus = Question::getQuestionById($id);
                $qus->number_appear = 1;
                $qus->save();
            }
            $model->question_ids = json_encode($request['question_ids']);

            $ans = isset($model->obstacle_race_answer) ? $model->obstacle_race_answer : "";

            $model->obstacle_race_answer = 'xxx';
            if ($model->save()) {
                if ($ans != "") {
                    $answer = new Answer();
                    $answer->content = $ans;
                    $answer->obstacle_race_package = $model->id;
                    $answer->true = 1;
                    $answer->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
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
        $request = Yii::$app->request->post();
        $question_ids = json_decode($model->question_ids);
        $package_finish = $model->package_finish;

        if ($model->load($request)) {
            foreach ($question_ids as $id) {
                $qus = Question::getQuestionById($id);
                $qus->number_appear = 0;
                $qus->save();
            }

            $question_ids_2 = $request['question_ids'];
            foreach ($question_ids_2 as $id) {
                $qus = Question::getQuestionById($id);
                $qus->number_appear = 1;
                $qus->save();
            }

            $model->question_ids = json_encode($request['question_ids']);
            $ans = isset($model->obstacle_race_answer) ? $model->obstacle_race_answer : "";
            $model->obstacle_race_answer = 'xxx';

            if ($model->save()) {
                if ($ans != "") {
                    $answer = Answer::find()->where(['obstacle_race_package' => $model->id])->one();
                    $answer->content = $ans;
                    $answer->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'question_ids' => $question_ids,
                'package_finish' => $package_finish
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
        $type_game = intval(Yii::$app->request->post('type_game'));
        $package_finish = intval(Yii::$app->request->post('package_finish'));

        $part_game = PartGame::getPartGameById($part_game_id);
        $params['number_question'] = $part_game->number_question;
        $params['type_game'] = $type_game;
        if ($package_finish != 0) {
            $params['package_finish'] = $package_finish;
        }
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
