<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PartGame */

$this->title = 'Update Part Game: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Part Game'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="part-game-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
