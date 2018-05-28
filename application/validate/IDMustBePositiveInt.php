<?php

namespace app\api\validate;

use think\Validate;

class IDMustBePositiveInt extends BaseValidate
{
	protected $rule = [
		'id' => 'require|isPositiveInt'
	];

	//自定义必须是正整数的方法

	protected function isPositiveInt()
	{
		
	}
}