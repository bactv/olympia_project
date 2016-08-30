<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PartGame */

$this->title = 'Update Part Game: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Part Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="part-game-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
