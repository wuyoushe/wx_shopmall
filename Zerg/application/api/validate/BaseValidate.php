<?php
namespace app\api\validate;

use think\Request;
use think\Validate;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{
	public function goCheck()
	{
		//获取所有的传递的参数
		$request = Request::instance();
		$params = $request->param();
		if(!$this->check($params)){
			$exception = new parameterException([
			    'msg'   =>  is_array($this->error) ? implode(';', $this->error) : $this->error
            ]);
			//抛出一个全局异常
			throw $exception;
		}
        return true;
	}

	protected function isPositiveInteger($value, $rule= '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
        {
            return true;
        }
        return $field;
    }
}














