<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 23:00
 */
namespace app\api\validate;

class ThemeProduct extends BaseValidate
{
    protected $rule = [
        't_id'  => 'number',
        'p_id'  => 'number',
    ];
}