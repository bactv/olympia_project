<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->label(Yii::t('cms', 'Title'))->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'content')->label(Yii::t('cms', 'Content'))->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?php
    echo '<label class="control-label">' . Yii::t('cms', 'Posted time') . '</label>';
    echo DatePicker::widget([
        'model' => $model,
        'attribute' => 'post_time',
        'options' => ['placeholder' => 'Enter posted time ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]);
    echo "<br/>";
    ?>

    <?php
    echo $form->field($model, 'thumb_version')->label(Yii::t('cms', 'Thumb'))->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ]);
    ?>

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
