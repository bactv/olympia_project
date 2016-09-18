<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DateTimeHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\PartGame */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Part Game'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="part-game-view">

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
                'attribute' => 'description',
                'label' => Yii::t('cms', 'Description'),
                'value' => strip_tags($model->description)
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

<style>
    table > tbody > tr > th {
        width: 30%;
    }
</style>
