<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionFormat */

$this->title = 'Update Question Format: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Question Formats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('cms', 'Update');
$this->params['title'] = Yii::t('cms', 'Update');
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-format-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
