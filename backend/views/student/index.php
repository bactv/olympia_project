<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = $this->params['title'] = 'Students';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label'=>'Create', 'url' => ['create'], 'options' => ['class' => 'btn btn-primary']],
    ['label'=>'Delete', 'url' => 'javascript:void(0)', 'options' => ['class' => 'btn btn-danger', 'onclick' => 'deleteAllItems()']]
];
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(['id' => 'admin-grid-view']);?> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'username',
            'password',
            'email',
            'phone',
            // 'fullname',
            // 'birthday',
            // 'school',
            // 'address',
            // 'created_time',
            // 'updated_time',
            // 'last_active_time',
            // 'status',
            // 'deleted',
            // 'thumb_version',
            // 'number_play_game',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'header' => Yii::t('cms', 'action'),
                'headerOptions' => ['style'=>'text-align: center;'],
                'contentOptions'=>['style'=>'text-align: center;'],
                'buttons' => [
                    'update' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => 'Update',
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => 'Delete',
                            'class'=>'btn btn-primary btn-xs btn-app',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => 'w0'
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>
<?php Pjax::end();?> 