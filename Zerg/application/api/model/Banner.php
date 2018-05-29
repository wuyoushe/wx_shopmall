<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 22:40
 */
namespace app\api\model;

use think\Model;
use app\lib\exception\MissException;

class Banner extends BaseModel
{
	public function items()
	{
		//一对多的关系
		//hasMany('关
        //
        //联模型名','外键名(通过什么关联)','主键名',['模型别名定义']);
		return $this->hasMany('BannerItem', 'banner_id', 'id');
	}

    /**
     * 定义关联多个表
     *public function item1(){
    *
     * }
     * 那么with([item,items1])
     */


	/**
	*@param $id int banner 所在位置
	*@return Banner
	*/
    public static function getBannerById($id )
    {
    	//with	关联预载入 ，关联items，以及img
        $banner = self::with(['items', 'items.img'])->find($id);
        if (!$banner)
        {
            throw new MissException();
        }
        return $banner;

    }
}