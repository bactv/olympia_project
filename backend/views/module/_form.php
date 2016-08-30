<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Module */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="module-form">

    <?php $form = ActiveForm::begin([
        'id' => 'module-form-horizontal',
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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
