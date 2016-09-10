<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use backend\models\PartGame;
use backend\models\Question;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\QuestionPackageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Question Packages';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>'Create', 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>'Delete', 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

<?php
$headerOptions = ['style'=>'text-align: center; vertical-align: middle;'];
$contentOptions = ['style'=>'text-align: center; vertical-align: middle;'];
?>

<?php Pjax::begin(['id' => 'admin-grid-view']);?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'id',
                'label' => Yii::t('cms', 'ID'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'name',
                'label' => Yii::t('cms', 'Name'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'part_game',
                'label' => Yii::t('cms', 'Part Game'),
                'format' => 'raw',
                'value' => function ($data) {
                    $game = PartGame::getPartGameById($data->part_game);
                    return (!empty($game)) ? $game->name : "";
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'question_ids',
                'label' => Yii::t('cms', 'Question IDS'),
                'format' => 'raw',
                'value' => function ($data) {
                    $question_ids = json_decode($data->question_ids);
                    $str = '';
                    if (!empty($question_ids)) {
                        foreach ($question_ids as $id) {
                            $str .= Html::a($id, Url::toRoute(['/question/' . $id]), ['target' => '_blank']) . ' , ';
                        }
                    }
                    return $str;
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'format' => 'raw',
                'options' => ['width' => '90px'],
                'value' => function ($data) {
                    if ($data['status'] == 1) {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['question-package/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['question-package/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
                    }
                },
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
            [
                'class' => 'backend\components\CActionColumn',
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 