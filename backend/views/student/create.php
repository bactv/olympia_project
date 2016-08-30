<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = 'Create Student';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

