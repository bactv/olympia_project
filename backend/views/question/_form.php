<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use backend\models\QuestionLevel;
use backend\models\QuestionTopic;
use backend\models\QuestionFormat;
use backend\models\TypeQuestion;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin([
        'id' => 'question'
    ]); ?>

    <?= $form->field($model, 'content')->label(Yii::t('cms', 'Content'))->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'question_topic')->label(Yii::t('cms', 'Topic'))->widget(Select2::className(), [
        'data' => ArrayHelper::map(QuestionTopic::getAllQuestionTopic(), 'id', 'name'),
        'options' => [
            'placeholder' => 'Select a topic ...',
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'question_level')->label(Yii::t('cms', 'Question Level'))->dropDownList(ArrayHelper::map(QuestionLevel::getAllQuestionLevel(), 'id', 'description'), [
        'prompt' => 'Select a question level ...'
    ]) ?>

    <?= $form->field($model, 'question_format')->label(Yii::t('cms', 'Format'))->dropDownList(ArrayHelper::map(QuestionFormat::getAllQuestionFormat(), 'id', 'description'), [
        'prompt' => 'Select a question format ...'
    ]) ?>

    <?= $form->field($model, 'type_question')->label(Yii::t('cms', 'Type'))->dropDownList(ArrayHelper::map(TypeQuestion::getAllTypeQuestion(), 'id', 'description'), [
        'prompt' => 'Select a type question ...',
        'id' => 'type-question'
    ]) ?>

    <?php echo '<b>' . Yii::t('cms', 'Answer') . '</b>' ?>
    <br/>
    <br />
    <div id="answer">
        <div class="row" id="row">
            <div class="col-md-8">
                <?= $form->field($model, 'answer[]')->label(false)->textInput(['value' => !empty($answers) ? $answers[0]->content : '']) ?>
            </div>
            <div class="col-md-3">
                <?php
                $checked = false;
                if ((!empty($answers)) && $answers[0]->true === 1) {
                    $checked = true;
                }
                ?>
                <input type="checkbox" name="ans" <?php echo $checked===true ? 'checked' : '' ?>> <?php echo Yii::t('cms', 'True Answer ') . '?' ?>
            </div>
            <div class="col-md-1">
                <a href="javascript:void(0);" id="del-answer" onclick="deleteAnswer(this.id)"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div id="list_answers" class="<?php echo (!empty($answers) ? count($answers) : 0) ?>">
        <?php if (!empty($answers)) {
            for ($i = 1; $i < count($answers); $i++) { ?>
                <div class="row" id="row-<?php echo ($i + 1) ?>">
                    <div class="col-md-8">
                        <?= $form->field($model, 'answer[]')->label(false)->textInput(['value' => $answers[$i]->content, 'required' => true]) ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                        $checked = false;
                        if ($answers[$i]->true === 1) {
                            $checked = true;
                        }
                        ?>
                        <input type="checkbox" name="ans" <?php echo $checked===true ? 'checked' : '' ?>> <?php echo Yii::t('cms', 'True Answer ') . '?' ?>
                    </div>
                    <div class="col-md-1">
                        <a href="javascript:void(0);" id="del-answer<?php echo ($i + 1) ?>" onclick="deleteAnswer(this.id)"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <?php echo Html::a(Yii::t('cms', 'Add Answer'), 'javascript:void(0);', ['id' => 'add-answer']) ?>

    <br/>
    <br/>
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
<script>
    function foo() {
        if( typeof foo.counter == 'undefined' ) {
            foo.counter = 0;
        }
        foo.counter++;
        return foo.counter;
    }

    function deleteAnswer (id) {
        var parent = $("div#list_answers a#" + id).parent().parent();
        parent.remove();
    }

    $(document).ready(function () {
        var curr_id = $("div#list_answers").attr('class');
        if (curr_id != 0) {
            for (var j = 0; j < (curr_id - 1); j++) {
                foo();
            }
        }
        //add form input answer
        $("a#add-answer").on('click', function () {
            var html = $("div#answer").html();  
            $("div#list_answers").append(html);
            var id = foo() + 1;
            console.log(id);
            $("div#list_answers a#del-answer").attr('id', 'del-answer-' + id);
            $("div#list_answers div#row").attr('id', "row-" + id);
            $("div#row-" + (id) + " input[type='text']").attr('value', '');
            $("div#row-" + (id) + " input[type='checkbox']").attr('checked', false);
        });

        // truoc khi submit form
        $("form#question").submit(function () {
            // gan gia tri trong input text vao value checkbox
            var id = foo();
            $("div#answer input[type='checkbox']").attr('value', $("div#answer input[type='text']").val());
            for (var i = 1; i < id; i++) {
                var value = $("div#row-" + i + " input[type='text']").val();
                $("div#row-" + i + " input[type='checkbox']").attr('value', value);
            }

            // kiem tra chua chon dap an dung
            var selected = [];
            $("div#answer input[type='checkbox']").each(function() {
                if ($(this).is(":checked")) {
                    selected.push($(this).attr('name'));
                }
            });
            $("div#list_answers input[type='checkbox']").each(function() {
                if ($(this).is(":checked")) {
                    selected.push($(this).attr('name'));
                }
            });
            if (selected.length < 1) {
                alert("Let\'s choose true answer.");
                return false;
            }
        });
    });

</script>

<style>
    div#answer a#del-answer {
        display: none;
    }
</style>