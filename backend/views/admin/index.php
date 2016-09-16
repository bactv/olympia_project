<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\AdminGroup;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Admin');
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
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'options' => ['width' => '30px'],
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'thumb_version',
                'label' => Yii::t('cms', 'Avatar'),
                'format' => 'raw',
                'value' => function ($model) {
                    $url = ($model->thumb_version === 1) ? Yii::$app->params['img_url']['data_path']['admin_avatar']['source'] .
                        '/' . $model->id . '.jpg' : Yii::getAlias('@web/themes/default/images/avatar/avatar.png');
                    return Html::img($url, ['class' => 'img-responsive']);
                },
                'options' => [
                    'width' => '90px',
                    'height' => '90px',
                ],
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'username',
                'label' => Yii::t('cms', 'Username'),
                'options' => [
                    'width' => '90px',
                ],
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'email',
                'label' => Yii::t('cms', 'Email'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'fullname',
                'label' => Yii::t('cms', 'Full name'),
                'options' => [
                    'width' => '120px',
                ],
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'filter' => [1 => Yii::t('cms', 'active'), 0 => Yii::t('cms', 'inactive')],
                'format' => 'raw',
                'options' => ['width' => '100px'],
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
                'label' => Yii::t('cms', 'Deleted'),
                'filter' => [1 => Yii::t('cms', 'deleted'), 0 => Yii::t('cms', 'not-deleted')],
                'format' => 'raw',
                'options' => ['width' => '100px'],
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
                'attribute' => 'admin_group_ids',
                'label' => Yii::t('cms', 'Admin Groups'),
                'filter' => ArrayHelper::map(AdminGroup::getAllGroups(), 'id', 'name'),
                'format' => 'raw',
                'options' => ['width' => '100px'],
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
                'header' => Yii::t('cms', 'Actions'),
                'options' => ['width' => '150px'],
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 