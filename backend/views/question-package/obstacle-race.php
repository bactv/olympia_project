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

$model = new QuestionPackage();

$questions = Question::find()->where(['part_end' => 1, 'status' => QUESTION_ACTIVE, 'deleted' => QUESTION_NOT_DELETED])->all();
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
    <input type="text" id="questionpackage-obstacle_race_answer" class="form-control" name="QuestionPackage[obstacle_race_answer]">
    <div class="help-block"></div>
</div>