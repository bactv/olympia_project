<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\QuestionLevel;
use backend\models\QuestionTopic;
use backend\models\QuestionFormat;
use backend\models\TypeQuestion;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->label(Yii::t('cms', 'Content'))->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'question_topic')->label(Yii::t('cms', 'Topic'))->widget(Select2::className(), [
        'data' => ArrayHelper::map(QuestionTopic::getAllQuestionTopic(), 'id', 'name'),
        'options' => [
            'placeholder' => 'Select a topic ...',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'question_level')->label(Yii::t('cms', 'Question Level'))->dropDownList(ArrayHelper::map(QuestionLevel::getAllQuestionLevel(), 'id', 'name'), [
        'prompt' => 'Select a level ...'
    ]) ?>

    <?= $form->field($model, 'question_format')->label(Yii::t('cms', 'Format'))->dropDownList(ArrayHelper::map(QuestionFormat::getAllQuestionFormat(), 'id', 'name'), [
        'prompt' => 'Select a format ...'
    ]) ?>

    <?= $form->field($model, 'type_question')->label(Yii::t('cms', 'Type'))->dropDownList(ArrayHelper::map(TypeQuestion::getAllTypeQuestion(), 'id', 'name'), [
        'prompt' => 'Select a type question ...',
        'id' => 'type-question'
    ]) ?>

    <?php echo '<b>' . Yii::t('cms', 'Answer') . '</b>' ?>
    <div id="answer">
        <p><input type="checkbox" name="ans"></p><?= $form->field($model, 'answer')->label(false)->textInput() ?>
    </div>
    <div id="list_answers">

    </div>

    <?= $form->field($model, 'status')->label(Yii::t('cms', 'Status'))->checkbox() ?>

    <?php
    if (!$model->isNewRecord) {
        echo $form->field($model, 'deleted')->label(Yii::t('cms', 'Deleted'))->checkbox();
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).ready(function () {
        $("select#type-question").on('click', function () {
            var value = $(this).val();

            if (value == 2) {

            }
        });
    });
</script>