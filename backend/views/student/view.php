<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DateTimeHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Students'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
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
                'label' => Yii::t('cms', 'ID')
            ],
            [
                'attribute' => 'username',
                'label' => Yii::t('cms', 'Username')
            ],
            [
                'attribute' => 'email',
                'label' => Yii::t('cms', 'Email')
            ],
            [
                'attribute' => 'phone',
                'label' => Yii::t('cms', 'Phone')
            ],
            [
                'attribute' => 'fullname',
                'label' => Yii::t('cms', 'Full name')
            ],
            [
                'attribute' => 'birthday',
                'label' => Yii::t('cms', 'Birthday'),
                'value' => DateTimeHelper::format_date($model->birthday, '-', '/')
            ],
            [
                'attribute' => 'school',
                'label' => Yii::t('cms', 'School')
            ],
            [
                'attribute' => 'address',
                'label' => Yii::t('cms', 'Address')
            ],
            [
                'attribute' => 'created_time',
                'label' => Yii::t('cms', 'Created Time'),
                'value' => DateTimeHelper::format_date_time($model->created_time, '-', '/')
            ],
            [
                'attribute' => 'updated_time',
                'label' => Yii::t('cms', 'Updated Time'),
                'value' => DateTimeHelper::format_date_time($model->updated_time, '-', '/')
            ],
            [
                'attribute' => 'last_active_time',
                'label' => Yii::t('cms', 'Last Active Time')
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'value' => ($model->status === 1) ? Yii::t('cms', 'Active') : Yii::t('cms', 'In-Active')
            ],
            [
                'attribute' => 'deleted',
                'label' => Yii::t('cms', 'Deleted'),
                'value' => ($model->deleted === 1) ? Yii::t('cms', 'Deleted') : Yii::t('cms', 'Not-deleted')
            ],
            [
                'attribute' => 'thumb_version',
                'label' => Yii::t('cms', 'Avatar')
            ],
            [
                'attribute' => 'number_play_game',
                'label' => Yii::t('cms', 'Number Play Game')
            ],
        ],
    ]) ?>

</div>

<style>
    table > tbody > tr > th {
        width: 30%;
    }
</style>
