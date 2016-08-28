<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Module */

$this->title = 'Update Module: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="module-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
