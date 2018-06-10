<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 22:44
 */
namespace app\lib\exception;

class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定的主题不存在';
    public $errorCode = 30000;
}