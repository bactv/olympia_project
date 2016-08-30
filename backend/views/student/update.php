<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = 'Update Student: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'Back', 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="student-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
