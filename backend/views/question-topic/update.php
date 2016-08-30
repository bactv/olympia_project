<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionTopic */

$this->title = 'Update Question Topic: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Question Topics', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
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
