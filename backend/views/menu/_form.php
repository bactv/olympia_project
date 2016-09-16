<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use backend\models\Menu;
use yii\helpers\ArrayHelper;
use backend\models\Module;
/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'parent_id')->label('Parent Menu')->widget(Select2::classname(), [
        'data' => Menu::getCategoryMenuTree(Menu::getAllMenus(), 0, 0),
        'options' => [
            'value' => 0,
            'placeholder' => 'Select a menu ...'
        ],
        'pluginOptions' => [
         'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'module_id')->label('Module')->dropDownList(ArrayHelper::map(Module::getAllModule(), 'id', 'name'), [
        'prompt' => 'Select a module ...'
    ]) ?>

    <?= $form->field($model, 'router')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <?php
    if (!$model->isNewRecord) {
        echo $form->field($model, 'deleted')->checkbox();
    }
    ?>

    <?php echo $form->field($model, 'icon')->textInput([
        'id' => 'icon',
        'title' => 'List Icon',
        'data-toggle' => 'popover',
        'data-placement' => "top",
        'data-html' => "true",
        'data-content' => $this->render('list_icon')
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save') : '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fa fa-repeat" aria-hidden="true"></i> ' . Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    div.arrow {
        display: none !important;
    }
    .popover {
        position: absolute;
        top: 100px !important;
        left: 0;
        z-index: 1010;
        display: none;
        max-width: 1000px !important;
        padding: 1px;
        text-align: left;
        white-space: normal;
        background-color: #ffffff;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
    }
    .popover-content {
        padding: 9px 14px;
        overflow: scroll;
        max-height: 500px;
    }
</style>
<script>
    $(document).ready(function () {
            $('[data-toggle="popover"]').popover();
    });
</script>
