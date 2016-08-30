<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\Admin;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'News';
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
                'attribute' => 'thumb_version',
                'label' => Yii::t('cms', 'Thumb'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'title',
                'label' => Yii::t('cms', 'Title'),
                'headerOptions' => $headerOptions,
            ],
            [
                'attribute' => 'content',
                'label' => Yii::t('cms', 'Content'),
                'format' => 'raw',
                'value' => function ($data) {
                    return substr(strip_tags($data->content), 0, 300);
                },
                'headerOptions' => $headerOptions,
            ],
            [
                'attribute' => 'created_by',
                'label' => Yii::t('cms', 'Created by'),
                'format' => 'raw',
                'value' => function ($data) {
                    $user = Admin::findIdentity($data->created_by);
                    return (!empty($user)) ? $user->username : "";
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'post_time',
                'label' => Yii::t('cms', 'Posted time'),
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
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['news/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['news/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
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
                'class' => 'backend\components\CActionColumn',
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 