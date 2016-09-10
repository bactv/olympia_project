<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\PartGame;
use yii\helpers\ArrayHelper;
use backend\models\PackageFinish;
use yii\helpers\Url;
use kartik\select2\Select2;
use backend\models\Question;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPackage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-package-form">

    <?php $form = ActiveForm::begin(['id' => 'form-package-question']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?php
    $disabled = false;
    if (!$model->isNewRecord) {
        $disabled = true;
    }
    ?>
    <?= $form->field($model, 'part_game')->dropDownList(ArrayHelper::map(PartGame::getAllPartsGame(), 'id', 'name'), [
        'prompt' => 'Select part game ...',
        'disabled' => $disabled
    ]) ?>

    <div id="list_package_question_end_part" style="display: none;">
        <?= $form->field($model, 'package_finish')->dropDownList(ArrayHelper::map(PackageFinish::getAllPackageFinish(), 'id', 'name'), [
            'prompt' => 'Select package finish ...'
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

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
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
                data: {'part_game': part_game, 'pk_end': pk_end},
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
