<?php
/**
 * Created by PhpStorm.
 * User: bac
 * Date: 31/08/2016
 * Time: 17:36
 */
use yii\helpers\Html;
?>

<div id="w2" class="grid-view table-responsive package">
    <table style="width: 100%;" class="table table-striped table-bordered" cellpadding="0" cellspacing="0"
           border="0">
        <thead>
            <th><?php echo Yii::t('cms', 'ID') ?></th>
            <th><?php echo Yii::t('cms', 'Name') ?></th>
            <th><?php echo Yii::t('cms', 'Birthday') ?></th>
            <th><?php echo Yii::t('cms', 'School') ?></th>
        </thead>
        <tbody>
            <?php static $i = 1; ?>
            <?php foreach ($players as $player) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo Html::encode($player->fullname) ?></td>
                    <td><?php echo Html::encode($player->birthday) ?></td>
                    <td><?php echo Html::encode($player->school) ?></td>
                </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</div>
