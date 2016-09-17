<?php
use backend\models\QuestionLevel;
use backend\models\QuestionTopic;
use yii\helpers\Html;
?>
<td><?php echo $question->id ?></td>
<td style="text-align: left;"><?php echo strip_tags($question->content) ?></td>
<td><?php echo QuestionLevel::getQuestionLevelById($question->question_level)->name ?></td>
<td><?php echo QuestionTopic::getQuestionTopicById($question->question_topic)->name ?></td>
<td>
    <?php
    echo Html::a('Change', 'javascript:void(0)', [
        'class' => 'btn btn-info change',
        'id' => $question->id,
        'title' => 'Change question',
        'data-toggle' => 'popover',
        'data-placement' => "top",
        'data-html' => "true",
        'container' => "body",
        'data-content' => $this->render('change_question', ['question_id' => $question->id])
    ]);
    ?>
</td>
<input type="hidden" name="question_ids[]" value="<?php echo $question->id ?>">
<style>
    div.arrow {
        display: none !important;
    }
    .popover {
    }
</style>

<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>