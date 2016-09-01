<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Game */

$this->title = 'Create Game';
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

