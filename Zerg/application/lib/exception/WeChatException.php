<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/1
 * Time: 12:28
 */

namespace app\lib\exception;
use think\Exception;

/**
 * 微信服务器异常
 */
class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = 'wechat unknown error';
    public $errorCode = 999;
}