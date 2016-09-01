<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\GameCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Games';
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
                'attribute' => 'description',
                'label' => Yii::t('cms', 'Description'),
                'format' => 'raw',
                'value' => function ($data) {
                    return substr(strip_tags($data->description), 0, 300);
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'date',
                'label' => Yii::t('cms', 'Time'),
                'format' => 'raw',
                'value' => function ($data) {
                    $time = date_create_from_format('Y-m-d H:i:s', $data->date);
                    $now = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                    return ($time < $now) ? 'Đã diễn ra' : 'Chưa diễn ra';
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'data_game',
                'label' => Yii::t('cms', 'Data Game'),
                'format' => 'raw',
                'value' => function ($data) {
                    $players = json_decode($data->data_game);
                    $str = '';
                    foreach ($players as $player) {
                        $user = \backend\models\Student::getStudentById($player->user_id);
                        if (!empty($user)) {
                            $str .= '<p>' . $user->fullname . ': ' . $player->score . '</p>';
                        }
                    }
                    return $str;
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'backend\components\CActionColumn',
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 