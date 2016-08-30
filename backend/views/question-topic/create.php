<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionTopic */

$this->title = 'Create Question Topic';
$this->params['breadcrumbs'][] = ['label' => 'Question Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-topic-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

