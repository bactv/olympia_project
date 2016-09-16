<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Admin */

$this->title = Yii::t('cms', 'Update Admin') . ': ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Admin'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'update');
$this->params['title'] = Yii::t('cms', 'update');
$this->params['menu'] = [
    ['label' => '<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];

?>
<div class="admin-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
