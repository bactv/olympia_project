<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\DateTimeHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = \backend\models\QuestionTopic::getQuestionTopicById($model->question_topic)->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Question'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">

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
                'attribute' => 'content',
                'label' => Yii::t('cms', 'Content'),
                'value' => strip_tags(html_entity_decode($model->content))
            ],
            [
                'attribute' => 'question_topic',
                'label' => Yii::t('cms', 'Question Topics'),
                'value' => \backend\models\QuestionTopic::getQuestionTopicById($model->question_topic)->name
            ],
            [
                'attribute' => 'question_level',
                'label' => Yii::t('cms', 'Question Levels'),
                'value' => \backend\models\QuestionLevel::getQuestionLevelById($model->question_level)->name
            ],
            [
                'attribute' => 'question_format',
                'label' => Yii::t('cms', 'Question Formats'),
                'value' => \backend\models\QuestionFormat::getQuestionFormatById($model->question_format)->name
            ],
            [
                'attribute' => 'type_question',
                'label' => Yii::t('cms', 'Type Questions'),
                'value' => \backend\models\TypeQuestion::getTypeQuestionById($model->type_question)->name
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
                'attribute' => 'created_by',
                'label' => Yii::t('cms', 'Created by'),
                'value' => ($model->admin === 1) ? \backend\models\Admin::findIdentity($model->created_by)->username :
                    \backend\models\Student::getStudentById($model->created_by)->username
            ],
            [
                'attribute' => 'updated_by',
                'label' => Yii::t('cms', 'Updated by'),
                'value' => ($model->admin === 1) ? \backend\models\Admin::findIdentity($model->updated_by)->username :
                    \backend\models\Student::getStudentById($model->updated_by)->username
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
                'attribute' => 'number_appear',
                'label' => Yii::t('cms', 'Number appear')
            ],
        ],
    ]) ?>

</div>

<style>
    table > tbody > tr > th {
        width: 25%;
    }
</style>
