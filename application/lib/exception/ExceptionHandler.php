<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25
 * Time: 20:49
 */

namespace app\lib\exception;

use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

/**
*重写Handle的render方法，实现自定义异常消息
*/
class ExceptionHandler extends Handle
{
	private $code;
	private $msg;
	private $errorCode;

	public function render(Exception $e)
	{
		if ($e instanceof BaseException)
		{
			//自定义异常，则控制http状态码，不需要记录日志
			$this->code      = $e->code;
			$this->msg  	 = $e->msg;
			$this->errorCode = $e->errorCode;
		}else 
		{
			var_dump(config('app_debug'));
			//如果是服务器未处理的异常，将http状态码设置为500，并记录日志
			if (config('app_debug'))
			{
				return parent::render($e);
			}

			$this->code = 500;
			$this->msg = 'sorry, we make a mistake.. (^o^)Y';
			$this->errCode = 999;
			$this->recordErrorLog($e);//日志记录错误的信息
		}

		$request = Request::instance();
		$result = [
			'msg'			=> $this->msg,
			'error_code'	=> $this->errorCode,
			'request_url'	=> $request = $request->url(),	
		];
		return json($result, $this->code);
	}
	/**
	*将异常写入日志
	*日志记录由think\Log类完成，在使用日志记录之前需要初始化日志类
	*/
	private function recordErrorLog(Exception $e)
	{
		Log::init([
			'type'	=>	'File',
			'path'	=>	LOG_PATH,
			'level'	=>	['error']
		]);
		Log::record($e->getMessage(), 'error');
	}

}