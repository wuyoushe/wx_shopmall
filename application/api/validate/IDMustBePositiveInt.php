<?php

namespace app\api\validate;

use app\api\validate\BaseValidate;


class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
}
