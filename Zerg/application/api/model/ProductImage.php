<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 20:33
 */
namespace app\api\model;

use think\Model;

class ProductImage extends BaseModel
{
    protected $hidden = ['img_id', 'delete_time', 'product_id'];
    public function imgUrl()
    {
        return $this->belongsTo('Image', 'img_id', 'id');
    }
}