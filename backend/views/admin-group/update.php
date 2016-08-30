<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */

$this->title = 'Update Admin Group: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Admin Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="admin-group-update">
    <?= $this->render('_form', [
        'model' => $model,
        'action_ids' => $action_ids
    ]) ?>

</div>
