<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\AdminGroup;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Admins';
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
                'attribute' => 'thumb_version',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'username',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'email',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'fullname',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'profession',
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
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['admin/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['admin/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
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
                'attribute' => 'last_active_time',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'admin_group_ids',
                'label' => Yii::t('cms', 'Group'),
                'format' => 'raw',
                'value' => function ($data) {
                    $group_ids = !empty($data->admin_group_ids) ? json_decode($data->admin_group_ids) : "";
                    $str = '';
                    if (!empty($group_ids)) {
                        foreach ($group_ids as $id) {
                            $group = AdminGroup::getGroupById($id);
                            if (!empty($group)) {
                                $str .= '<p>' . $group->name . '</p>';
                            }
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