<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 20:36
 */
namespace app\api\model;

class ProductProperty extends BaseModel
{
    protected $hidden = ['product_id', 'delete_time', 'id'];
}