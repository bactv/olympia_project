<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use backend\models\Menu;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Menus';
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


<?= \leandrogehlen\treegrid\TreeGrid::widget([
    'dataProvider' => $dataProvider,
    'keyColumnName' => 'id',
    'parentColumnName' => 'parent_id',
    'parentRootValue' => '0', //first parentId value
    'pluginOptions' => [
    ],
    'columns' => [
        [
            'attribute' => 'name',
            'label' => Yii::t('cms', 'Name'),
        ],
        [
            'attribute' => 'router',
            'label' => Yii::t('cms', 'Router'),
            'headerOptions' => $headerOptions,
            'contentOptions'=> $contentOptions,
        ],
        [
            'attribute' => 'status',
            'label' => Yii::t('cms', 'Status'),
            'format' => 'raw',
            'options' => ['width' => '90px'],
            'value' => function ($data) {
                if ($data['status'] == 1) {
                    return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['menu/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                } else {
                    return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['menu/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
                }
            },
            'headerOptions' => $headerOptions,
            'contentOptions'=> $contentOptions,
        ],
        [
            'attribute' => 'deleted',
            'format' => 'raw',
            'options' => ['width' => '90px'],
            'value' => function ($data) {
                if ($data['deleted'] == 1) {
                    return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = ""><i class="fa fa-check" style="color: red;"></i></a></div>';
                } else {
                    return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = ""><i class="fa fa-dot-circle-o" style="color: green;"></i></a></div>';
                }
            },
            'headerOptions' => $headerOptions,
            'contentOptions'=> $contentOptions,
        ],
        [
            'format' => 'raw',
            'value' => function ($model) {
                $view = Html::a('<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;', Url::toRoute(['/menu/' . $model->id]), [
                    'title' => 'View',
                    'class'=>'btn btn-default btn-action',
                    'data-pjax' => '0',
                ]);
                $update = Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;', Url::toRoute(['/menu/update/' . $model->id]), [
                    'title' => 'Update',
                    'class'=>'btn btn-default btn-action',
                    'data-pjax' => '0',
                ]);
                $delete = Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp;', Url::toRoute(['/menu/delete/' . $model->id]), [
                    'title' => 'Delete',
                    'class'=>'btn btn-default btn-action',
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => 'w0'
                ]);
                return $view . ' ' . $update . ' ' . $delete;
            },
            'headerOptions' => $headerOptions,
            'contentOptions'=> $contentOptions,
        ],
    ]
]); ?>

<?php Pjax::end();?>
<style>
    .btn-action {

    }
</style>