<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 22:48
 */
namespace app\lib\exception;

/**
 * 404时抛出异常
 */

class MissException extends BaseException
{
    public $code = 404;
    public $msg  =  'global:your required resource are not found';
    public $errorCode = 10001;
}