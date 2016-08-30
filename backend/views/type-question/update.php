<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeQuestion */

$this->title = 'Update Type Question: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Type Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="type-question-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
