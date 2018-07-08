<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 22:53
 */
namespace app\api\model;

use think\Model;

class Product extends BaseModel
{
    protected $autoWriteTimestamp = 'datetime';
    /**
     * @定义隐藏的字段
     */
    protected $hidden = [
        'delete_time', 'main_img_id', 'pivot', 'from', 'category_id', 'create_time', 'update_time'
    ];
    //读取器的设置方法
    public function getMainImgUrlAttr($value, $data)
    {
        return $this->prefixImgUrl($value, $data);
    }

    /**
     * 图片属性
     */
    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    /**
     * 获取某分类下的商品
     * @param $categoryID
     * @param int $page
     * @param int $size
     * @param bool $paginate
     * @return \think\Paginator
     */
    public static function getProductsByCategoryID($categoryID, $paginate = true,
$page = 1, $size = 30)
    {
        $query = self::where('category_id', '=', $categoryID);
        if (!$paginate)
        {
            return $query->select();
        }else
        {
            return $query->paginate(
                $size, true,[
                    'page'  => $page
                ]
            );
        }
    }
    /**
     * 获取商品详情
     * @param $id
     * @return null | Product
     */
    public static function getProductDetail($id)
    {
        $product = self::with(
            [
                'imgs' => function ($query)
                {
                    $query->with(['imgUrl'])
                        ->order('order', 'asc');
                }])
            ->with('properties')
            ->find($id);
        return $product;
    }

    public static function getMostRecent($count)
    {
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }


}













