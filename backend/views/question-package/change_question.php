<?php

use yii\helpers\Url;
?>
<p class="old" style="display: none;" id="<?php echo $question_id ?>"></p>
<h3>Change Question</h3>

<select id="change" class="form-control">
    <option value="">Select question ...</option>
    <?php foreach (\backend\models\Question::find()->all() as $q) { ?>
        <option value="<?php echo $q->id ?>"><?php echo $q->id . ': ' . $q->content ?></option>
    <?php } ?>
</select>

<br />
<a href="javascript:void(0)" id="ok" class="btn btn-primary">OK</a>

<script>
    $(document).ready(function () {
        var old_question = $("p.old").attr('id');

        $("a#ok").on('click', function () {
            var new_question = $("select#change option:selected").val();
            if (new_question != "") {
                $.ajax({
                    method: 'POST',
                    data: {'question_id': new_question},
                    url: '<?php echo Url::toRoute(['/question-package/change-question'])?>',
                    success: function (data) {
                        $("tr#" + old_question).html(data);
                        $("tr#" + old_question).attr('id', new_question);
                    }
                });
            } else {
                $('[data-toggle="popover"]').hide();
            }
        });
    });
</script>