<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 16/09/2016
 * Time: 9:35 CH
 */

use yii\helpers\Html;
use backend\models\Game;
use yii\helpers\Url;

?>

<td><?php echo $serial_number ?></td>
<td><?php echo Html::encode($player->fullname) ?></td>
<td><?php echo Html::encode($player->birthday) ?></td>
<td><?php echo Html::encode($player->school) ?></td>
<td>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary show_modal" data-toggle="modal" id="<?php echo $player->id ?>">
        <?php echo Yii::t('cms', 'Change Player') ?>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal_<?php echo $player->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Change Player</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $players_valid = Game::changePlayer($ids);
                    ?>
                    <select id="change_player" class="form-control">
                        <option value="">Select a player other ...</option>
                        <?php foreach ($players_valid as $pl) { ?>
                            <option value="<?php echo $pl->id ?>"><?php echo $pl->id . ': ' . $pl->username ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" id="old_player" value="<?php echo $player->id ?>">
                    <input type="hidden" id="serial_number" value="<?php echo $serial_number ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-change-user">Save change</button>
                </div>
            </div>
        </div>
    </div>
</td>

<script>
    $(document).ready(function () {

        $("button.show_modal").on('click', function () {
            var value = $(this).attr('id');
            $("div#myModal_" + value).modal('show');
        });
    });
</script>
