<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Game */

$this->title = 'Update Game: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="game-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
