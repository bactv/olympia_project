<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Module */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'name')->textInput([
        'placeholder' => 'Enter module name ...'
    ]) ?>

    <?= $form->field($model, 'description')->textInput([
        'placeholder' => 'Enter module description ...'
    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?php
    if (!$model->isNewRecord) {
        echo $form->field($model, 'deleted')->checkbox();
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save') : '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fa fa-repeat" aria-hidden="true"></i> ' . Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
