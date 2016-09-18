<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DateTimeHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionFormat */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Question Formats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-format-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
                'label' => Yii::t('cms', 'ID')
            ],
            [
                'attribute' => 'name',
                'label' => Yii::t('cms', 'Name')
            ],
            [
                'attribute' => 'code',
                'label' => Yii::t('cms', 'Code')
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('cms', 'Description')
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'value' => ($model->status === 1) ? Yii::t('cms', 'Active') : Yii::t('cms', 'In-Active')
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
        ],
    ]) ?>

</div>
