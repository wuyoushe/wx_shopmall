<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 23:15
 */
namespace app\api\validate;

class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids'   => 'require|checkIDs'
    ];
    protected $message = [
      'ids' => 'ids参数必须是以逗号分隔的多个正整数'
    ];

    protected function checkIDs($value)
    {
        $value = explode(',', $value);
        if (empty($value)) {
            return false;
        }
        foreach ($value as $id) {
            if (!$this->isPositiveInteger($id)) {
                return false;
            }
        }
        return true;
    }

    protected function checkIDs1($value, $rule, $data)
    {
        $result = true;
        $values = explode(',', $value);
        if (empty($value)) {
            $result = false;
        }
        array_walk($values, function ($id) use (&$result) {
          if (!$this->isPositiveInteger($id)) {
              $result = false;
          }
        });
        return $result;
        }
}
























