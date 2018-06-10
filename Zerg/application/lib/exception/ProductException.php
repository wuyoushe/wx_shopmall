<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 23:28
 */
namespace app\lib\exception;

class ProductException extends BaseException
{
    public $code      = 404;
    public $msg       = '指定的商品不存在， 请检查商品ID';
    public $errorCode = 20000;
}