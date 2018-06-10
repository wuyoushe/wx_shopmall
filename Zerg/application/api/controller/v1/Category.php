<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 22:11
 */
namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\Category as CategoryModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\MissException;
use think\Controller;

class Category extends BaseController
{
    /**
     * 获取全部类目列表，但不包含类目下的商品
     * Request 演示依赖注入Request对象
     * @url /category/all
     * @return array of Categories
     * @throws MissException
     */
    public function getAllCategories()
    {

        $categories = CategoryModel::all([], 'img');
        return $categories;
        if (empty($categories)) {
            throw new MissException([
                'msg'       =>  '还没有任何类名',
                'errorCode' =>  '50000'
            ]);
        }
        return $categories;
    }

    public function getCategory($id)
    {
        $validate = new IDMustBePositiveInt();
        $validate->goCheck();
        $category = CategoryModel::getCategories($id);
        if (empty($category)) {
            throw new MissException([
                'msg'   =>  'category not found'
            ]);
        }
        return $category;
    }
}













