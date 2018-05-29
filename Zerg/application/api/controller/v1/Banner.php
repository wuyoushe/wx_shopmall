<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25
 * Time: 20:55
 */

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\validate\IDMustBePositiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\MissException;

class Banner extends BaseController
{
    /**
     * 获取Banner信息
     * @url     /banner/:id
     * @http    get
     * @param   int $id banner id
     * @return  array of banner item, code 200
     * @other MissException
     */
	public function getBanner($id)
	{
	    $validate = new IDMustBePositiveInt();
	    $validate->goCheck();
	    $banner = BannerModel::getBannerById($id);
	    //删除一些字段属性，使其不返回的一种不太好的方式
        //$data = $banner->toArray();
        //unset($data['delete_time]);
        //方式2 模型有hidden()方法，可以调用
        //$banner->hidde(['delete_time','update_time']);
        //或者显示哪些$banner->visible(['delete_time']);
        if (!$banner ) {
            throw new MissException([
                'msg'   =>  '请求的banner不存在',
                'errorCode' => 40000
            ]);
        }
        return $banner;

	}
}













