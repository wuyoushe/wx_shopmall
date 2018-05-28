<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 22:40
 */
namespace app\api\model;
use think\Model;

class Banner extends Model
{
    public static function getBannerById($id )
    {
        $banner = self::with(['item', 'items.img'])->find($id);

        return $banner;
    }
}