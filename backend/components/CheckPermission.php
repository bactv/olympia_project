<?php
/**
 * Created by PhpStorm.
 * User: bac
 * Date: 29/08/2016
 * Time: 08:20
 */
namespace backend\components;

use backend\models\Admin;
use backend\models\AdminGroup;
use Yii;

class CheckPermission
{
    public static function checkPermission($user_id, $controller_id, $action_id)
    {
        $check = false;
        $admin = Admin::find()->where(['id' => $user_id])->one();
        $group_permission = !empty($admin->admin_group_ids) ? json_decode($admin->admin_group_ids) : null;

        if (!empty($group_permission)) {
            foreach ($group_permission as $group_id) {
                $arr_controllers = [];
                $arr_actions = [];

                $group = AdminGroup::find()->where(['id' => $group_id, 'status' => ADMIN_GROUP_ACTIVE])->one();
                if (!empty($group)) {
                    $permissions = json_decode($group->permissions);
                    foreach ($permissions as $arr) {
                        $arr_controllers[] = $arr->controller_id;
                        foreach ($arr->actions as $at) {
                            $arr_actions[] = $at;
                        }
                    }
                    if (in_array($controller_id, $arr_controllers) && in_array($action_id, $arr_actions)) {
                        $check = true;
                        break;
                    }
                }
            }
        }
        return $check;
    }
}