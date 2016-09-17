<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use backend\models\PartGame;
use yii\helpers\ArrayHelper;
use backend\models\PackageFinish;
use yii\helpers\Url;
use backend\models\Question;
use backend\models\TypeGame;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-package-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form-package-question',
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'name')->label(Yii::t('cms', 'Name'))->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'type_game')->label(Yii::t('cms', 'Type Games'))->dropDownList(ArrayHelper::map(TypeGame::getAllTypesGame(), 'id', 'name'), [
        'prompt' => 'Select type game ...',
    ]) ?>

    <?php
    $disabled = false;
    if (!$model->isNewRecord) {
        $disabled = true;
    }
    ?>
    <?= $form->field($model, 'part_game')->label(Yii::t('cms', 'Part Game'))->dropDownList(ArrayHelper::map(PartGame::getAllPartsGame(), 'id', 'name'), [
        'prompt' => 'Select part game ...',
        'disabled' => $disabled
    ]) ?>

    <div id="list_package_question_end_part" style="display: none;">
        <?= $form->field($model, 'package_finish')->label(Yii::t('cms', 'Package Finish'))->dropDownList(ArrayHelper::map(PackageFinish::getAllPackageFinish(), 'id', 'name'), [
        ]) ?>
    </div>

    <?php
    if ($model->isNewRecord) { ?>
        <?php echo Html::a(Yii::t('cms', 'Choose question'), 'javascript:void(0);', ['class' => 'btn btn-warning', 'id' => 'choose-question', 'style' => 'display: none;']); ?>

        <div id="list-questions"></div><br/>

        <div id="obstacle_race-answer"></div>
    <?php } else if ($model->part_game !== 2) {
        $part_game = PartGame::getPartGameById($model->part_game);
        $questions = [];
        foreach ($question_ids as $id) {
            $qus = Question::getQuestionById($id);
            $questions[] = $qus;
        }
        echo $this->render('list-questions', compact('part_game', 'questions'));
    } else if ($model->part_game === 2) {
        echo $this->render('obstacle-race', ['old_model' => $model]);
    } ?>

    <?= $form->field($model, 'status')->checkbox(['label' => false])->label(Yii::t('cms', 'Status')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save') : '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fa fa-repeat" aria-hidden="true"></i> ' . Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    function checkButtonChooseQuestion(value) {
        if (value == 0) {
            $("a#choose-question").attr('style', 'display: none;');
            $("div#list-questions").html('');
        } else {
            $("a#choose-question").removeAttr('style');
            $("div#list-questions").html('');
        }
    }
    $(document).ready(function () {
        var part_game = 0;
        var pk_end = 0;
        var type_game = 0;

        $("select#questionpackage-type_game").on('change', function () {
            type_game = $(this).val();
        });

        $("select#questionpackage-part_game").on('change', function () {
            part_game = $(this).val();

            if (part_game == 4) {
                $("a#choose-question").attr('style', 'display: none');

                $("div#list_package_question_end_part").show();

                $("select#questionpackage-package_finish").on("change", function () {
                    pk_end = $(this).val();
                    checkButtonChooseQuestion(pk_end);
                });
            } else {
                $("div#list_package_question_end_part").hide();
                checkButtonChooseQuestion(part_game);
            }

            if (part_game == 2) {
                $("a#choose-question").attr('style', 'display: none;');
                $.ajax({
                    method: 'POST',
                    url: '<?php echo Url::toRoute(['/question-package/obstacle-race'])?>',
                    success: function (data) {
                        $("div#obstacle_race-answer").html(data);
                    }
                });
            } else {
                $("div#obstacle_race-answer").html('');
            }

        });

        $("a#choose-question").on('click', function () {
            $.ajax({
                method: 'POST',
                data: {'part_game': part_game, 'package_finish': pk_end, 'type_game': type_game},
                url: '<?php echo Url::toRoute(['/question-package/choose-questions-package']) ?>',
                success: function (data) {
                    $("div#list-questions").html(data);
                }
            });
        });

        $("form#form-package-question").submit(function () {
            var rowCount = $('table#table-questions tr').length;
            var part_game = $("select#questionpackage-part_game").val();

            if (rowCount == 0 && (part_game != 2)) {
                alert("Vui lòng chọn câu hỏi cho gói câu hỏi này.");
                return false;
            }

            if ($("input#questionpackage-obstacle_race_answer").val() == '') {
                $("div.field-questionpackage-obstacle_race_answer").addClass('has-error');
                $("div.field-questionpackage-obstacle_race_answer > div.help-block").text('Obstacle Race Answer is required.');
                alert("Error");
                return false;
            }

        });
    });
</script>
