<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use backend\models\Admin;
use backend\models\Student;
use yii\helpers\Url;
use backend\models\QuestionFormat;
use backend\models\QuestionLevel;
use backend\models\QuestionTopic;
use backend\models\TypeQuestion;
use backend\models\Answer;
use common\helpers\DateTimeHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = Yii::t('cms', 'Questions');
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
                'attribute' => 'content',
                'label' => Yii::t('cms', 'Content'),
                'format' => 'raw',
                'value' => function ($data) {
                    return substr(strip_tags($data->content), 0, 300) . ' ...';
                },
                'options' => [
                    'width' => '30%'
                ],
                'headerOptions' => ['style'=>'vertical-align: middle;'],
                'contentOptions' => ['style'=>'vertical-align: middle;']
            ],
            [
                'attribute' => 'answer',
                'label' => Yii::t('cms', 'Answer'),
                'format' => 'raw',
                'value' => function ($data) {
                    $str = '';
                    $answers = Answer::getAnswersByQuestionId($data->id);
                    foreach ($answers as $answer) {
                        if ($answer->true === 1) {
                            $str .= '<li style="color: #00a157">';
                            $str .= '<p>' . $answer->content . '</p>';
                            $str .= '</li>';
                        }
                    }
                    return $str;
                },
                'options' => [
                    'width' => '10%'
                ],
                'headerOptions' => ['style'=>'vertical-align: middle;'],
                'contentOptions' => ['style'=>'vertical-align: middle;']
            ],
            [
                'attribute' => 'created_by',
                'label' => Yii::t('cms', 'Created by'),
                'format' => 'raw',
                'value' => function ($data) {
                    $user = ($data->admin === 1) ? Admin::findIdentity($data->created_by) : Student::getStudentById($data->created_by);
                    return (!empty($user->username)) ? $user->username : "";
                },
                'headerOptions' => $headerOptions,
                'contentOptions' => $contentOptions,
            ],
            [
                'attribute' => 'created_time',
                'label' => Yii::t('cms', 'Created Time'),
                'format' => 'raw',
                'value' => function ($model) {
                    return DateTimeHelper::format_date_time($model->created_time, '-', '/');
                },
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
            [
                'attribute' => 'status',
                'label' => Yii::t('cms', 'Status'),
                'format' => 'raw',
                'options' => ['width' => '90px'],
                'value' => function ($data) {
                    if ($data['status'] == 1) {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 1, \''.Url::toRoute(['question/change-status']).'\')"><i class="fa fa-check" style="color: green;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = "changeStatusItems('.$data['id'].', 0, \''.Url::toRoute(['question/change-status']).'\')"><i class="fa fa-dot-circle-o" style="color: red"></i></a></div>';
                    }
                },
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
            ],
            [
                'attribute' => 'deleted',
                'label' => Yii::t('cms', 'Deleted'),
                'format' => 'raw',
                'options' => ['width' => '90px'],
                'value' => function ($data) {
                    if ($data['deleted'] == 1) {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = ""><i class="fa fa-check" style="color: red;"></i></a></div>';
                    } else {
                        return '<div id="item-status-'.$data['id'].'"><a href="javascript:void(0);" class="f-s-18" onclick = ""><i class="fa fa-dot-circle-o" style="color: green;"></i></a></div>';
                    }
                },
                'headerOptions' => $headerOptions,
                'contentOptions'=> $contentOptions,
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
