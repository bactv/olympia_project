<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 10/09/2016
 * Time: 4:13 CH
 */

use backend\models\Question;
use backend\models\QuestionPackage;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Answer;

$model = isset($old_model) ? $old_model : (new QuestionPackage());
$answer = isset($old_model) ? Answer::find()->where(['obstacle_race_package' => $old_model->id])->one() : "";
$values = isset($old_model) ? json_decode($old_model->question_ids) : "";

$questions = Question::find()->where(['obstacle_race' => 1, 'status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED, 'number_appear' => 0])->all();
$new_questions = [];
foreach ($questions as $q) {
    $qus = new Question();
    $qus->id = $q->id;
    $qus->content = strip_tags(html_entity_decode($q->content));
    $new_questions[] = $qus;
}

?>

<?php echo '<label class="control-label">Questions</label>'; ?>

<?php echo Select2::widget([
        'data' => ArrayHelper::map($new_questions, 'id' , 'content'),
        'value' => $values,
        'name' => 'question_ids',
        'options' => [
            'placeholder' => 'Select a question ...',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    'id' => 'select-question',
    ]);
?>
<br>

<div class="form-group field-questionpackage-obstacle_race_answer required">
    <label class="control-label" for="questionpackage-obstacle_race_answer">Obstacle Race Answer</label>
    <input type="text" id="questionpackage-obstacle_race_answer" class="form-control" name="QuestionPackage[obstacle_race_answer]" value="<?php echo isset($answer->content) ? $answer->content : '' ?>">
    <div class="help-block"></div>
</div>