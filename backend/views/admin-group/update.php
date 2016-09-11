<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */

$this->title = Yii::t('cms', 'Update Admin Group') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admin Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label' => Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="admin-group-update">
    <?= $this->render('_form', [
        'model' => $model,
        'action_ids' => $action_ids
    ]) ?>

</div>
