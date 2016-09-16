<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use backend\models\TypeGame;
use kartik\datetime\DateTimePicker;
use yii\helpers\Url;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\Game */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    if (Yii::$app->session->hasFlash('error')) {
        echo Alert::widget([
            'options' => ['class' => 'alert-danger'],
            'body' => Yii::$app->session->getFlash('error'),
        ]);
    }
?>

<div class="game-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 2, 'deviceSize' => ActiveForm::SIZE_SMALL]
    ]); ?>

    <?= $form->field($model, 'name')->label(Yii::t('cms', 'Game Name'))->textInput([
        'maxlength' => 255,
        'placeholder' => Yii::t('cms', 'Enter game name') . ' ...',
    ]) ?>

    <?= $form->field($model, 'description')->label(Yii::t('cms', 'Description'))->widget(CKEditor::className(), [
        'options' => [
            'rows' => 3,
        ],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'type_game')->label(Yii::t('cms', 'Type Game'))->dropDownList(ArrayHelper::map(TypeGame::getAllTypesGame(), 'id', 'description'), [
        'prompt' => Yii::t('cms', 'Select a type game') . ' ...',
    ]) ?>

    <?= $form->field($model, 'date')->label(Yii::t('cms', 'Event Time'))->widget(DateTimePicker::classname(), [
        'options' => [
            'placeholder' => Yii::t('cms', 'Enter event time') . ' ...',
        ],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy hh:ii'
        ]
    ]); ?>

    <?php
    echo Html::a('<i class="fa fa-user-plus" aria-hidden="true"></i> ' . Yii::t('cms', 'Choose player'), 'javascript:void(0);', ['class' => 'btn btn-warning', 'id' => 'choose-player']);
    ?>

    <br/>
    <br/>
    <div id="info-players"></div>
    <br/>
    <br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save') : '<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . Yii::t('cms', 'Save'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('<i class="fa fa-repeat" aria-hidden="true"></i> ' . Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(document).ready(function () {
        $("a#choose-player").on('click', function () {
            var type_game = $("select#game-type_game").val();
            $.ajax({
                method: 'POST',
                data: {'type_game' : type_game},
                url: '<?php echo Url::toRoute(['/game/choose-player']) ?>',
                success: function (data) {
                    $("div#info-players").html(data);
                },
            });
        });
    });
</script>
