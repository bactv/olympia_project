<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\PackageFinish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="package-finish-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'name')->label(Yii::t('cms', 'Name'))->textInput([
        'maxlength' => 255,
        'placeholder' => 'Nhập tên gói ...'
        ]) ?>

    <?= $form->field($model, 'description')->label(Yii::t('cms', 'Description'))->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'number_question')->label(Yii::t('cms', 'Number Questions'))->textInput([
        'type' => 'number',
        'placeholder' => 'Nhập số câu hỏi cảu gói ...'
    ]) ?>

    <?= $form->field($model, 'time_reply')->label(Yii::t('cms', 'Time To Reply'))->textInput([
        'maxlength' => 255,
        'placeholder' => 'Nhập theo định dạng (câu 1-câu 2-....)'
    ]) ?>

    <?= $form->field($model, 'score_question')->label(Yii::t('cms', 'Score Of Question'))->textInput([
        'maxlength' => 255,
        'placeholder' => 'Nhập theo định dạng (điểm câu 1-điểm câu 2-....)'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save') : '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fa fa-repeat" aria-hidden="true"></i> ' . Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
