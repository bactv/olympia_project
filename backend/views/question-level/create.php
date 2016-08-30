<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionLevel */

$this->title = 'Create Question Level';
$this->params['breadcrumbs'][] = ['label' => 'Question Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

