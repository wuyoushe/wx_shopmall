<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 23:05
 */

namespace app\lib\exception;

/**
 * 创建成功 (如果不需要返回任何消息)
 * 201 创建成功， 202需要一个异步的处理才能完成
 */


class SuccessMessage extends BaseException
{
    public $code = 201;
    public $msg = 'ok';
    public $errorCode = 0;
}











