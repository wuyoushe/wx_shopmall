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

    public function getDataByRule($arrays)
    {
        if (array_key_exists('user_id', $arrays) | array_key_exists('uid', $arrays)) {
            throw new ParameterException([
                'msg'   => '参数中包含非法的参数名user_id或uid'
            ]);
        }
        $newArray = [];

        foreach ($this->rule as $key=> $rule) {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }

	protected function isPositiveInteger($value, $rule= '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0)
        {
            return true;
        }
        return $field;
    }

    protected function isNotEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (empty($value)) {
            return $field. '不允许为空';
        }else {
            return true;
        }
    }

    protected function isMobile($value)
    {
        $rule = '^a(3|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule, $value);
        if($result) {
            return true;
        }else {
            return false;
        }
    }

}














