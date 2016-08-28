<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */

$this->title = 'Create Admin Group';
$this->params['breadcrumbs'][] = ['label' => 'Admin Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="admin-group-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

