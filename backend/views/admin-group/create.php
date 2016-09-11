<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */

$this->title = Yii::t('cms', 'Create Admin Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admin Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create');
$this->params['menu'] = [
    ['label' => Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="admin-group-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

