<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/27
 * Time: 22:37
 */

namespace app\base\controller;


use think\Config;
use think\Controller;
use think\Request;
use think\View;

class Base extends Controller
{
    /**
     *构造方法
     *@param Request $request Request对象
     *@access public
     */

    public function __construct(Request $request = null)
    {
        Parent::__construct();
        if(is_null($request)){
            $request = Request::instance();
        }
        $this->view = View::instance(Config::get('template'), Config::get('view_replace_str'));
        $this->request = $request;

        //控制器初始化
        $this->_initialize();


    }


    /**
     * @param string $code
     * @param string $data
     * @param string $msg
     * @return array
     */

    static public function showReturnCode($code = '', $data = [], $msg = '')
    {
       $return_data = [
          'code'    => '500',
          'msg'     => '未定义消息',
          'data'    => $code ==1001 ? $data : []
       ] ;
       if(empty($code)){
           return $return_data;
       }
       if(!empty($msg)){
           $return_data['msg'] = $msg;
       }
       
       return $return_data;
    }

    static public function showReturnCodeWithOutData($code = '', $msg = '')
    {
        return self::showReturnCode($code, [], $msg);
    }
}












