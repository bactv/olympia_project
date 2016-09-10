<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPackage */

$this->title = 'Update Question Package: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Question Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-package-update">
    <?= $this->render('_form', [
        'model' => $model,
        'question_ids' => $question_ids,
        'package_finish' => $package_finish
    ]) ?>

</div>
