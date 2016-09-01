<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPackage */

$this->title = 'Create Question Package';
$this->params['breadcrumbs'][] = ['label' => 'Question Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-package-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

