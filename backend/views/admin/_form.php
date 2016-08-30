<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\AdminGroup;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->label(Yii::t('cms', 'Username'))->textInput(['maxlength' => 255]) ?>

    <?php
    if ($model->isNewRecord) {
        echo $form->field($model, 'password')->label(Yii::t('cms', 'Password'))->passwordInput(['maxlength' => 255]);
    }
    ?>

    <?= $form->field($model, 'email')->label(Yii::t('cms', 'Email'))->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'fullname')->label(Yii::t('cms', 'Fullname'))->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'birthday')->label(Yii::t('cms', 'Birthday'))->textInput() ?>

    <?= $form->field($model, 'profession')->label(Yii::t('cms', 'Professions'))->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'thumb_version')->label(Yii::t('cms', 'Thumbs'))->textInput() ?>

    <?= $form->field($model, 'admin_group_ids')->label(Yii::t('cms', 'Group'))->widget(Select2::className(), [
        'data' => ArrayHelper::map(AdminGroup::getAllGroups(), 'id', 'name'),
        'options' => [
            'placeholder' => 'Select a group ...',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
