<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PartGameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Part Games';
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
            ['class' => 'yii\grid\CheckboxColumn'],
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
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('cms', 'Description'),
                'format' => 'raw',
                'value' => function ($data) {
                    return substr(strip_tags($data->description), 0, 300);
                },
                'headerOptions' => $headerOptions,
            ],
            [
                'attribute' => 'created_time',
                'label' => Yii::t('cms', 'Created Time'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'backend\components\CActionColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 