<?php
/**
 * Created by PhpStorm.
 * User: bac_b
 * Date: 24/08/2016
 * Time: 7:22 SA
 */
namespace common\models;

use common\models\db\AdminDB;
use Yii;

class AdminBase extends AdminDB
{
    const ADMIN_ACTIVE = 1;
    const ADMIN_INACTIVE = 0;
}