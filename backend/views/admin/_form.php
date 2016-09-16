<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\AdminGroup;
use kartik\select2\Select2;
use kartik\file\FileInput;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">
    <div class="container-fluid">
    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 3, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->label(Yii::t('cms', 'Username'))->textInput([
                'maxlength' => 255,
                'placeholder' => Yii::t('cms', 'Enter username') . ' ... ',
            ]) ?>

            <?php
            if ($model->isNewRecord) {
                echo $form->field($model, 'password')->label(Yii::t('cms', 'Password'))->passwordInput([
                    'maxlength' => 255,
                    'placeholder' => Yii::t('cms', 'Enter password') . ' ... ',
                ]);
            }
            ?>

            <?= $form->field($model, 'email')->label(Yii::t('cms', 'Email'))->textInput([
                'maxlength' => 255,
                'placeholder' => Yii::t('cms', 'Enter email') . ' ... ',
            ]) ?>

            <?= $form->field($model, 'fullname')->label(Yii::t('cms', 'Full name'))->textInput([
                'maxlength' => 255,
                'placeholder' => Yii::t('cms', 'Enter fullname') . ' ... ',
            ]) ?>

            <?= $form->field($model, 'birthday')->label(Yii::t('cms', 'Birthday'))->widget(DatePicker::classname(), [
                'options' => [
                    'placeholder' => Yii::t('cms', 'Enter birth date') . ' ... ',
                ],
                'pluginOptions' => [
                    'autoclose' => true,
                ]
            ]); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'profession')->label(Yii::t('cms', 'Profession'))->textInput([
                'maxlength' => 255,
                'placeholder' => Yii::t('cms', 'Enter profession') . ' ... ',
            ]) ?>

            <?= $form->field($model, 'admin_group_ids')->label(Yii::t('cms', 'Admin Groups'))->widget(Select2::className(), [
                'data' => ArrayHelper::map(AdminGroup::getAllGroups(), 'id', 'name'),
                'options' => [
                    'placeholder' => Yii::t('cms', 'Group Permission') . ' ... ',
                    'multiple' => true,
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>


            <?php
            $initialPreview = [];
            $initialPreviewConfig = [];
            if (!$model->isNewRecord) {
                $initialPreview = [
                    "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
                ];
                $initialPreviewConfig = [
                    ['caption' => 'Moon.jpg', 'size' => '873727'],
                    ['caption' => 'Earth.jpg', 'size' => '1287883'],
                ];
            }
            ?>
            <?= $form->field($model, 'thumb_upload')->label(Yii::t('cms', 'Avatar'))->widget(FileInput::classname(), [
                'options'=> [
                    'multiple' => false,
                ],
                'pluginOptions' => [
                    'initialPreview'=> $initialPreview,
                    'initialPreviewAsData'=> true,
                    'initialPreviewConfig' => $initialPreviewConfig,
                    'overwriteInitial' => false,
                    'maxFileSize' => 2800
                ]
            ]); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save') : '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('<i class="fa fa-repeat" aria-hidden="true"></i> ' . Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
