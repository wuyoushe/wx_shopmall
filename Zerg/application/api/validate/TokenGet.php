<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 12:24
 */

namespace app\api\validate;

class TokenGet extends BaseValidate
{
    protected $rule = [
        'code' => 'require|isNotEmpty'
    ];

    protected $message=[
        'code' => '没有code还想拿token？做梦哦'
    ];
}