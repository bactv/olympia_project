<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionLevel */

$this->title = 'Update Question Level: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Question Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-level-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
