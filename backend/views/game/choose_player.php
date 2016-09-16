<?php
/**
 * Created by PhpStorm.
 * User: bac
 * Date: 31/08/2016
 * Time: 17:36
 */
use yii\helpers\Html;
use backend\models\Game;
use yii\helpers\Url;

$ids = [];
foreach ($players as $pl) {
    $ids[] = $pl->id;
}

?>

<div id="w2" class="grid-view table-responsive package">
    <table style="width: 100%;" class="table table-striped table-bordered" cellpadding="0" cellspacing="0"
           border="0">
        <thead>
            <th><?php echo Yii::t('cms', 'ID') ?></th>
            <th><?php echo Yii::t('cms', 'Name') ?></th>
            <th><?php echo Yii::t('cms', 'Birthday') ?></th>
            <th><?php echo Yii::t('cms', 'School') ?></th>
            <th></th>
        </thead>
        <tbody>
            <?php static $i = 1; ?>
            <?php foreach ($players as $player) { ?>
                <tr id="<?php echo $player->id ?>">
                    <td><?php echo $i ?></td>
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
                                        <input type="hidden" id="serial_number" value="<?php echo $i ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="save-change-user">Save change</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php $i++; } ?>
        </tbody>
    </table>
</div>

<style>
    div.arrow {
        display: none !important;
    }
    .popover {
    }
</style>

<script>
    $(document).ready(function () {

        $("button.show_modal").on('click', function () {
            var value = $(this).attr('id');
            $("div#myModal_" + value).modal('show');
        });

        $("button#save-change-user").on('click', function () {
            var player_id = $("select#change_player").val();
            var old_id = $("input#old_player").val();
            var serial_number = $("input#serial_number").val();
            var ids = '<?php echo json_encode($ids); ?>';

            $.ajax({
                method: 'POST',
                url: '<?php echo Url::toRoute(['/game/change-player']) ?>',
                data: {'old_player' : old_id, 'serial_number' : serial_number, 'ids': ids, 'new_player' : player_id},
                success: function (data) {
                    $("tr#" + old_id).html(data);
                    $("tr#" + old_id).attr('id', player_id);
                }
            });

            $("div.modal").hide();
            $("div.modal-backdrop").hide();
        });
    });
</script>
