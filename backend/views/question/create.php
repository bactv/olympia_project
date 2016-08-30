<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Create Question';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

