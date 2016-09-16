<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Admin Groups');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=> '<i class="fa fa-plus" aria-hidden="true"></i> ' . Yii::t('cms', 'Create'), 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=> '<i class="fa fa-trash-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Delete'), 'url' => ['delete'], 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
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
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'name',
                'label' => Yii::t('cms', 'Name Group'),
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('cms', 'Description'),
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'format' => 'raw',
                'options' => ['width' => '90px'],
                'value' => function ($data) {
                    if ($data['status'] == 1) {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['admin-group/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['admin-group/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
                    }
                },
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
            [
                'attribute' => 'created_time',
                'label' => Yii::t('cms', 'Created Time'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'updated_time',
                'label' => Yii::t('cms', 'Updated Time'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'backend\components\CActionColumn',
                'header' => Yii::t('cms', 'Action'),
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 