<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
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

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->label(Yii::t('cms', 'Description'))->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'type_game')->label(Yii::t('cms', 'Type'))->dropDownList(ArrayHelper::map(TypeGame::getAllTypesGame(), 'id', 'description'), [
        'prompt' => 'Select a type game ...',
    ]) ?>

    <?= $form->field($model, 'date')->widget(DateTimePicker::classname(), [
        'options' => ['placeholder' => 'Enter event time ...'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy hh:ii'
        ]
    ]); ?>

    <?php
    echo Html::a(Yii::t('cms', 'Choose player'), 'javascript:void(0);', ['class' => 'btn btn-warning', 'id' => 'choose-player']);
    ?>

    <br/>

    <div id="info-players"></div>
    <br/>
    <br/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']); ?>
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
                error: function () {
                    alert("Error!");
                }
            });
        });
    });
</script>
