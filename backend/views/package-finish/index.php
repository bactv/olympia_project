<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PackageFinishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Package Finishes');
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>'<i class="fa fa-plus" aria-hidden="true"></i> ' . Yii::t('cms', 'Create'), 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>'<i class="fa fa-trash-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Delete'), 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

<?php
$headerOptions = ['style'=>'text-align: center; vertical-align: middle;'];
$contentOptions = ['style'=>'text-align: center; vertical-align: middle;'];
?>

<?php Pjax::begin(['id' => 'admin-grid-view']);?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'name',
                'label' => Yii::t('cms', 'Name'),
                'headerOptions' => ['style'=>'vertical-align: middle;'],
                'contentOptions' => ['style'=>'vertical-align: middle;'],
            ],
            [
                'attribute' => 'description',
                'label' => Yii::t('cms', 'Description'),
                'headerOptions' => ['style'=>'vertical-align: middle;'],
                'contentOptions' => ['style'=>'vertical-align: middle;'],
            ],
            [
                'attribute' => 'number_question',
                'label' => Yii::t('cms', 'Number Questions'),
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'time_reply',
                'label' => Yii::t('cms', 'Time To Reply'),
                'format' => 'raw',
                'value' => function ($model) {
                    $arr = json_decode($model->time_reply);
                    $str = '';
                    for ($i = 0; $i < count($arr); $i++) {
                        $str .= '<p>' . 'Câu ' . ($i + 1) . ': ' . $arr[$i] . 's' . '</p>';
                    }
                    return $str;
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'score_question',
                'label' => Yii::t('cms', 'Score Of Question'),
                'format' => 'raw',
                'value' => function ($model) {
                    $arr = json_decode($model->score_question);
                    $str = '';
                    for ($i = 0; $i < count($arr); $i++) {
                        $str .= '<p>' . 'Câu ' . ($i + 1) . ': ' . $arr[$i] . ' điểm' . '</p>';
                    }
                    return $str;
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'class' => 'backend\components\CActionColumn',
                'header' => Yii::t('cms', 'Action'),
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 