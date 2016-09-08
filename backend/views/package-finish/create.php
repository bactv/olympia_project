<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PackageFinish */

$this->title = 'Create Package Finish';
$this->params['breadcrumbs'][] = ['label' => 'Package Finishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="package-finish-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

