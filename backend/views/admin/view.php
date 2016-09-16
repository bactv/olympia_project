<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;
?>
<div class="admin-view">

    <p>
        <?= Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'id',
                'label' => 'ID',
                'value' => $model->id,
            ],
            [
                'attribute' => 'username',
                'label' => Yii::t('cms', 'Username'),
                'value' => $model->username,
            ],
            [
                'attribute' => 'email',
                'label' => Yii::t('cms', 'Email'),
                'value' => $model->email,
            ],
            [
                'attribute' => 'fullname',
                'label' => Yii::t('cms', 'Full name'),
                'value' => $model->fullname,
            ],
            [
                'attribute' => 'birthday',
                'label' => Yii::t('cms', 'Birthday'),
                'value' => $model->birthday,
            ],
            [
                'attribute' => 'profession',
                'label' => Yii::t('cms', 'Profession'),
                'value' => $model->profession,
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'value' => ($model->status === 1) ? Yii::t('cms', 'Active') : Yii::t('cms', 'Inactive'),
            ],
            [
                'attribute' => 'deleted',
                'label' => Yii::t('cms', 'Deleted'),
                'value' => ($model->deleted === 1) ? Yii::t('cms', 'Deleted') : Yii::t('cms', 'Not-deleted'),
            ],
            [
                'attribute' => 'avatar',
                'label' => Yii::t('cms', 'Avatar'),
                'value' => $model->thumb_version,
            ],
            [
                'attribute' => 'created_time',
                'label' => Yii::t('cms', 'Created Time'),
                'value' => $model->created_time,
            ],
            [
                'attribute' => 'updated_time',
                'label' => Yii::t('cms', 'Updated Time'),
                'value' => $model->updated_time,
            ],
            [
                'attribute' => 'created_by',
                'label' => Yii::t('cms', 'Created by'),
                'value' => $model->created_by,
            ],
            [
                'attribute' => 'updated_by',
                'label' => Yii::t('cms', 'Updated by'),
                'value' => $model->updated_by,
            ],
            [
                'attribute' => 'last_active_time',
                'label' => Yii::t('cms', 'Last Active Time'),
                'value' => $model->last_active_time,
            ],
            [
                'attribute' => 'admin_group_ids',
                'label' => Yii::t('cms', 'Admin Groups'),
                'value' => $model->admin_group_ids,
            ]
        ]
    ]) ?>

</div>
