<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 11:42
 */

namespace app\api\model;

use think\Model;


class ThirdApp extends BaseModel
{
    public static function check($ac, $se)
    {
        $app = self::where('app_id', '=', $ac)
            ->where('app_secret', '=', $se)
            ->find();
        return $app;

    }

}










