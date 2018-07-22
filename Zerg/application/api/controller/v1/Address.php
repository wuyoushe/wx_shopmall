<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/22
 * Time: 10:45
 */

namespace app\api\controller\v1;


use app\api\validate\AddressNew;
use app\api\service\Token as TokenService;
use app\api\model\User as UserModel;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address
{
    public function createOrUpdateAddress()
    {
        $validate = new AddressNew();
        $validate->goCheck();
        //根据Token来获取uid
        //根据uid来查找用户数据，判断用户是否存在，如果不存在则抛出异常
        //获取用户从客户端提交来的地址信息
        //根据用户地址信息是否存在，从而判断是添加还是更新地址
        $uid = TokenService::getCurrentUid();
        $user = UserModel::get($uid);
        if(!$user) {
            throw new UserException([
                'code'      => 404,
                'mgs'       => '用户收货地址不存在',
                'errorCode' => 60001
            ]);
        }
        $userAddress = $user->address;
        $dataArray = $validate->getDataByRule(input('post.'));
        if(!$userAddress) {
            $user->address()->save($dataArray);
        }else {
            $user->address->save($dataArray);
        }
        return new SuccessMessage();


    }

}