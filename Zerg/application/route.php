<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
//访问自定义版本下面的控制器 v1.控制器
use think\Route;
Route::post('index','index/index/index');

//Miss 404
//Miss 路由开启，默认的普通模式将无法访问
//Route::miss('api/v1.Miss/miss');
 Route::get('api/:version/banner/:id', 'api/:version.Banner/getBanner');
//路由被重新匹配
// Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
// Route::get('api/:version/theme/:id', 'api/:version.Theme/getComplexOne');
 //分组路由
Route::group('api/:version/theme', function(){
   Route::get('', 'api/:version.Theme/getSimpleList');
   Route::get('/:id', 'api/:version.Theme/getComplexOne');
   Route::post(':t_id/product/:p_id', 'api/:version.Theme/addThemeProduct');
   Route::delete(':t_id/product/:p_id', 'api/:version.Theme/deleteThemeProduct');
});

//Product
Route::post('api/:version/product', 'api/:version.Product/createOne');
Route::delete('api/:version/product/:id', 'api/:version.Product/deleteOne');
Route::get('api/:version/product/by_category/paginate', 'api/:version.Product/getByCategory');
Route::get('api/:version/product/by_category', 'api/:version.Product/getAllInCategory');
Route::get('api/:version/product/:id', 'api/:version.Product/getOne',[],['id'=>'\d+']);
Route::get('api/:version/product/recent', 'api/:version.Product/getRecent');

//分类列表
Route::get('api/:version/category', 'api/:version.Category/getCategories');
Route::get('api/:version/category/all', 'api/:version.Category/getAllCategories');

//Token
Route::post('api/:version/token/user', 'api/:version.Token/getToken');

Route::post('api/:version/token/app', 'api/:version.Token/getAppToken');
Route::post('api/:version/token/verify', 'api/:version.Token/verifyToken');

Route::post('api/:version/address', 'api/:version.Address/createOrUpdateAddress');











































