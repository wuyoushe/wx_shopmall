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