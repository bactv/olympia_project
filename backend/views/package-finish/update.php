<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PackageFinish */

$this->title = 'Update Package Finish: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Package Finishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="package-finish-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
