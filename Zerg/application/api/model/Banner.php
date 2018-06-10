<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 22:40
 */
namespace app\api\model;

use think\Model;

class Banner extends BaseModel
{
	public function items()
	{
		//一对多的关系
		//hasMany('关联模型名','外键名','主键名',['模型别名定义']);
		return $this->hasMany('BannerItem', 'banner_id', 'id');
	}

	/**
	*@param $id int banner 所在位置
	*@return Banner
	*/
    public static function getBannerById($id )
    {
    	//with	关联预载入 
        $banner = self::with(['items', 'items.img'])->find($id);

        return $banner;
    }
}