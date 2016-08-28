<?php

namespace backend\models;

use Yii;
use common\behaviors\TimestampBehavior;
use yii\helpers\Url;


class Menu extends \common\models\MenuBase
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    self::EVENT_BEFORE_UPDATE => ['updated_time']
                ]
            ]
        ];
    }

    /**
     * Get all backend menu
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAllMenus()
    {
        return static::find()->where(['status' => MENU_ACTIVE, 'deleted' => MENU_NOT_DELETED,
            'module_id' => MENU_BACKEND])->all();
    }

    /**
     * Get menu backend by menu_id
     * @param $menu_id
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getMenuById($menu_id)
    {
        return static::find()->where(['menu_id' => $menu_id, 'status' => MENU_ACTIVE, 'deleted' => MENU_NOT_DELETED,
            'module_id' => MENU_BACKEND])->one();
    }

    /**
     * Get Parent menu
     * @param $parent_id
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getParentMenuByMenuId($parent_id)
    {
        return static::find()->where(['parent_id' => $parent_id, 'status' => MENU_ACTIVE, 'deleted' => MENU_NOT_DELETED,
            'module_id' => MENU_BACKEND])->one();
    }

    /**
     * Get all child menu by parent_id
     * @param $parent_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getChildMenu($parent_id)
    {
        return static::find()->where(['status' => MENU_ACTIVE, 'deleted' => MENU_NOT_DELETED, 'module_id' => MENU_BACKEND,
            'parent_id' => $parent_id])->all();
    }

    /**
     * Show menu
     * @param $categoryMenu
     * @return string
     */
    public static function categoryDropDown($categoryMenu)
    {
        static $view;

        foreach ($categoryMenu  as  $menu) {
            $view .= static::setHtmlMenu($menu);
            if (static::getChildMenu($menu->id) == null) {
                $view .= "</li>";
                continue;
            }
            $view .= "<ul class=\"treeview-menu\">";
            static::categoryDropDown(static::getChildMenu($menu->id));
            $view .= "</ul>";
            $view .= "</li>";
        }
        return $view;
    }

    /**
     * @param $menu
     * @return string
     */
    private static function setHtmlMenu($menu)
    {
        if ($menu->parent_id != 0) {
            $str = "<li>";
        } else {
            $str = "<li class=\"treeview\">";
        }
        $str .= "<a href=\"" . Url::toRoute($menu['router']) . "\">";
        $str .= $menu["icon"] . " <span>" . $menu['name'] . "</span>";
        if (static::getChildMenu($menu->id) != null) {
            $str .= "<span class=\"pull-right-container\">";
            $str .= "<i class=\"fa fa-angle-left pull-right\"></i>";
            $str .= "</span>";
        }
        $str .= "</a>";
        return $str;
    }

    public static function getCategoryMenuTree($categoryArray, $parentId, $level)
    {
        static $options;
        $level++;
        foreach ($categoryArray  as  $array) {
            if($array['parent_id'] == $parentId) {
                $opt = str_repeat("-- ", $level-1) . $array['name'] ;
                $options[$array['id']] =  $opt;
                $newParent = $array['id'];
                $options = static::getCategoryMenuTree($categoryArray, $newParent, $level , $options);
            }
        }
        return $options;
    }
}