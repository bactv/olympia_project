<?php

namespace backend\controllers;

use backend\models\Student;
use Yii;
use backend\models\Game;
use common\models\search\GameCategorySearch;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\helpers\DateTimeHelper;

/**
 * GameController implements the CRUD actions for Game model.
 */
class GameController extends BackendController
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
     * Lists all Game models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GameCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Game model.
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
     * Creates a new Game model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Game();

        if ($model->load(Yii::$app->request->post())) {
            $players = Game::choosePlayer($model->type_game);
            $num_game = Game::find()->select('num_game')->max('num_game');
            $num_game = $num_game != null ? $num_game : 1;
            $data = [];
            if ((!empty($players)) && (count($players) === 4)) {
                foreach ($players as $player) {
                    $temp['user_id'] = $player->id;
                    $temp['score'] = 0;
                    $temp['game'] = $model->type_game;
                    $data[] = $temp;
                }
                $model->data_game = json_encode($data);
                $model->num_game = $num_game;
                $model->date = DateTimeHelper::format_date_time($model->date, '/', '-');

                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                Yii::$app->session->setFlash('error', 'Number players not enough!');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Game model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date = DateTimeHelper::format_date_time($model->date, '-', '/');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Game model.
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
     * Choose player
     * @return string
     */
    public function actionChoosePlayer()
    {
        $type_game = Yii::$app->request->post('type_game');
        if ($type_game == '') {
            return 'Vui lòng chọn loại cuộc thi';
        }
        $players = Game::choosePlayer($type_game);
        if (count($players) < 4) {
            return 'Số người chơi không đủ';
        }
        return $this->renderAjax('choose_player', compact('players'));
    }

    /**
     * Change player
     * @return string
     */
    public function actionChangePlayer()
    {
        $new_player = (int) Yii::$app->request->post('new_player');
        $old_player = (int) Yii::$app->request->post('old_player');
        $serial_number = (int) Yii::$app->request->post('serial_number');
        $ids = json_decode(Yii::$app->request->post('ids'));
        array_push($ids, $new_player);
        $arr_ids = array_diff($ids, [$old_player]);
        $player = Student::getStudentById($new_player);
        return $this->renderAjax('change_player', ['player' => $player, 'serial_number' => $serial_number, 'ids' => $arr_ids]);
    }

    /**
     * Finds the Game model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Game the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Game::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
