<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\PartGame;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-package-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'part_game')->dropDownList(ArrayHelper::map(PartGame::getAllPartsGame(), 'id', 'vi_name'), [
        'prompt' => 'Select part game ...'
    ]) ?>

    <div id="list_package_question_end_part" style="display: none;">

    </div>

    <?= $form->field($model, 'question_ids')->widget(Select2::className(), [

    ]) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(document).ready(function () {
        $("select#questionpackage-part_game").on('change', function () {
            var id = $(this).val();
            if (id == 4) {
                $("div#list_package_question_end_part").show();
            }
        });
    });
</script>
