<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 23:56
 */
namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
	protected $hidden = ['id', 'img_id', 'banner_id', 'delete_time'];

	public function img()
	{
	    //img与BannerItem关系一对一，使用belongTo()
        //belongTo(关联模型名字，外键，主键名);
        //需要从哪边关联另一边就到哪里写
		return $this->belongsTo('Image', 'img_id', 'id');
	}
}