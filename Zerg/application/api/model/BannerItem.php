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
		return $this->belongsTo('Image', 'img_id', 'id');
	}
}