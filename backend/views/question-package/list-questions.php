<?php

use backend\models\QuestionLevel;
use backend\models\QuestionTopic;
use yii\helpers\Html;
?>
<h3>Gói câu hỏi phần thi <?php echo $part_game->name . ': ' . $part_game->number_question . ' câu hỏi' ?></h3>

<div id="w2" class="grid-view table-responsive package">
    <table style="width: 100%;" class="table table-striped table-bordered" cellpadding="0" cellspacing="0"
           border="0" id="table-questions">
        <thead>
        <th>ID</th>
        <th style="text-align: left;">Question</th>
        <th>Level</th>
        <th>Topic</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($questions as $question) { ?>
            <tr id="<?php echo $question->id ?>">
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
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <br/>
</div>

<style>
    div.arrow {
        display: none !important;
    }
    .popover {
        left: 30% !important;
        min-width: 50%;
        max-width: 50%;
    }
    select#select > option {
        width: 50%;
    }

    .table > tbody > tr > td , .table > thead > tr > th {
        text-align: center;
        vertical-align: middle;
    }

</style>

<script>
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>