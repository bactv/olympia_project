<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionFormat */

$this->title = Yii::t('cms', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('cms', 'Question Formats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = Yii::t('cms', 'Create');
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-reply" aria-hidden="true"></i> ' . Yii::t('cms', 'Back'), 'url' => ['index'], 'options' => ['class' => 'btn btn-primary']],
];
?>
<div class="question-format-update">
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>

