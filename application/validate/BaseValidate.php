<?php

class BaseValidate extends Validate
{
	public function goCheck()
	{
		//获取所有的传递的参数
		$request = Request::instance();
		$params = $request->param();

		$result = $this->check();
		if(!$result){
			$error = $this->error();
			//抛出一个全局异常
			throw new Exception($error);
		}else{
			return true;
		}

	}
}