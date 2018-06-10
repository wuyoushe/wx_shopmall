<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 18:12
 */

namespace app\api\validate;
class Count extends BaseValidate
{
    protected $rule = [
      'count'   => 'isPositiveInteger|between:1,15',
    ];
}














