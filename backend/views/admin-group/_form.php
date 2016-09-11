<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\AdminController;
use backend\models\AdminAction;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\AdminGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label(Yii::t('cms', 'Name Group'))->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->label(Yii::t('cms', 'Description'))->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->label(Yii::t('cms', 'Status'))->checkbox() ?>

    <h3><b><?php echo Yii::t('cms', 'Permission') ?></b></h3>
    <p><?php echo Html::a(Yii::t('cms', 'Update Router'), 'javascript:void(0);', ['class' => 'btn btn-warning', 'id' => 'update-router']) ?></p>
    <div id="w2" class="grid-view table-responsive package">
        <table style="width: 100%;" class="table table-striped table-bordered" cellpadding="0" cellspacing="0"
               border="0">
            <thead>
                <th>Controller</th>
                <th>Action</th>
                <th><?php echo Yii::t('cms', 'All') ?></th>
            </thead>
            <tbody>
            <?php foreach (AdminController::find()->all() as $controller) { ?>
                <tr>
                    <td><?php echo Html::encode($controller->controller) ?></td>
                    <td>
                        <?php foreach (AdminAction::find()->where(['controller_id' => $controller->id])->all() as $action) { ?>
                            <?php
                            $checked = false;
                            if (isset($action_ids) && in_array($action->id, $action_ids)) {
                                $checked = true;
                            }
                            ?>
                            <p>
                                <input type="checkbox" name="action_ids[]" value="<?php echo $action->id; ?>" id="all-action-<?php echo $controller->id ?>" <?php echo $checked==true ? 'checked' : '' ?>/>
                                <?php echo $action->action ?>
                            </p>
                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        $checked = false;
                        $allActions = AdminAction::find()->select(['id'])->where(['controller_id' => $controller->id])->all();
                        $arr_action_ids = [];
                        foreach ($allActions as $action) {
                            $arr_action_ids[] = $action->id;
                        }
                        if (isset($action_ids) && array_diff($arr_action_ids, $action_ids) == null) {
                            $checked = true;
                        }
                        ?>
                        <input type="checkbox" id="<?php echo $controller->id ?>" class="check-all-controller" <?php echo $checked==true ? 'checked' : '' ?>>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <br/>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('cms', 'Create') : Yii::t('cms', 'Update'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cms', 'Reset'), ['class' => 'btn btn-default']); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(document).ready(function () {
        $("input.check-all-controller").on('click', function () {
            var id = $(this).attr('id');
            if ($(this).is(":checked")) {
                $("input#all-action-" + id).prop("checked", true);
            } else {
                $("input#all-action-" + id).prop("checked", false);
            }
        });

        $("a#update-router").on('click', function () {
            $.ajax({
                method: 'POST',
                url: '<?php echo Url::toRoute(['/router-permission/update-router']) ?>',
                success: function () {
                    console.log("Success");
                    location.reload();
                },
                error: function () {
                    console.log("Error");
                }
            });
        });
    });
</script>