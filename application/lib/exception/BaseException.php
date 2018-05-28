<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 22:50
 */
namespace app\lib\exception;
use think\Exception;

/**
 * Class BaseException
 * 自定义异常基类
 */

class BaseException extends Exception
{
    public $code = 400;
    public $msg  =  'invalid parameters';
    public $errorCode = 999;

    public $shouldToClient = true;

    /**
     *构造函数接收一个关联数组
     * @param array $params
     * 关联数据只应包含code,msg,errorcode 且不应该是空值
     */

    public function __construct($params = [])
    {
        if(!is_array($params))
        {
            return;
        }
        if(array_key_exists('code', $params))
        {
           $this->code = $params['code'];
        }
        if(array_key_exists('msg', $params))
        {
            $this->msg = $params['msg'];
        }
        if(array_key_exists('errorcode', $params))
        {
            $this->errorCode = $params['errorCode'];
        }
    }
}















