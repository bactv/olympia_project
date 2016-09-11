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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->label(Yii::t('cms', 'username'))->textInput([
        'maxlength' => 255,
        'placeholder' => Yii::t('cms', 'Enter username') . ' ... ',
    ]) ?>

    <?php
    if ($model->isNewRecord) {
        echo $form->field($model, 'password')->label(Yii::t('cms', 'password'))->passwordInput([
            'maxlength' => 255,
            'placeholder' => Yii::t('cms', 'Enter password') . ' ... ',
        ]);
    }
    ?>

    <?= $form->field($model, 'email')->label(Yii::t('cms', 'email'))->textInput([
        'maxlength' => 255,
        'placeholder' => Yii::t('cms', 'Enter email') . ' ... ',
    ]) ?>

    <?= $form->field($model, 'fullname')->label(Yii::t('cms', 'fullname'))->textInput([
        'maxlength' => 255,
        'placeholder' => Yii::t('cms', 'Enter fullname') . ' ... ',
    ]) ?>

    <?= $form->field($model, 'birthday')->label(Yii::t('cms', 'birthday'))->widget(DatePicker::classname(), [
        'options' => [
            'placeholder' => Yii::t('cms', 'Enter birth date') . ' ... ',
        ],
        'pluginOptions' => [
            'autoclose' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'profession')->label(Yii::t('cms', 'profession'))->textInput([
        'maxlength' => 255,
        'placeholder' => Yii::t('cms', 'Enter profession') . ' ... ',
    ]) ?>

    <?php
    $initialPreview = [];
    $initialPreviewConfig = [];
    if (!$model->isNewRecord) {
        $initialPreview = [
            "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
            "http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg"
        ];
        $initialPreviewConfig = [
            ['caption' => 'Moon.jpg', 'size' => '873727'],
            ['caption' => 'Earth.jpg', 'size' => '1287883'],
        ];
    }
    ?>
    <?= FileInput::widget([
        'model' => $model,
        'name' => 'thumb_upload',
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
    ]);
    ?>

    <?= $form->field($model, 'admin_group_ids')->label(Yii::t('cms', 'admin_group_ids'))->widget(Select2::className(), [
        'data' => ArrayHelper::map(AdminGroup::getAllGroups(), 'id', 'name'),
        'options' => [
            'placeholder' => Yii::t('cms', 'Group Permission') . ' ... ',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('cms', 'create') : Yii::t('cms', 'update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
