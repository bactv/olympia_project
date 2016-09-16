<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Game */

$this->title = Yii::t('cms', 'Create Game');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Games'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create Game');
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="game-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

