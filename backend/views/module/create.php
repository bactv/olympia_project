<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Module */

$this->title = 'Create Module';
$this->params['breadcrumbs'][] = ['label' => 'Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = 'Update';
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="module-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

