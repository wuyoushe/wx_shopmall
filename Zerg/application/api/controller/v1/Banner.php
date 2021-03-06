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
        if (!$banner ) {
            throw new MissException([
                'msg'   =>  '请求的banner不存在',
                'errorCode' => 40000
            ]);
        }
        return $banner;

	}
}













