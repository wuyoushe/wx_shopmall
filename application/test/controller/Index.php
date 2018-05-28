<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 22:14
 */
namespace app\test\controller;
use app\test\model\Category as CategoryModel;
use app\test\model\Category;
use Firebase\JWT\JWT;
use think\Controller;

class Index extends Controller
{
    public function index($id =1)
    {
        $category = new CategoryModel();
        $cats = CategoryModel::all();
        if($cats)
        {
            $cats = collection($cats)->toArray();
        }
        var_dump($cats);
    }

}














