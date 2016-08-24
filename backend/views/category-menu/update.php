<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryMenu */

$this->title = 'Update Category Menu: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Category Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'module_id' => $model->module_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-menu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
