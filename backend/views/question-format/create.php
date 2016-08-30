<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionFormat */

$this->title = 'Create Question Format';
$this->params['breadcrumbs'][] = ['label' => 'Question Formats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-format-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

