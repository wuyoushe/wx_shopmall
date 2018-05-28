<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25
 * Time: 20:55
 */

namespace app\api\controller\v1;

use think\Controller;
use think\Validate;

class Banner extends Controller
{
	//构建参数验证

	//获取banner,$id获取哪个banner
	public function getBanner($id)
	{
		try{
			
		}catch(Exception $e){

		}
		//echo '请求参数是:';
		//echo $id;
		$data = [
			'id' 	=>$id
		];

		$validate = new Validate([
			'name'	=> 'require|max:10',
			'email'	=> 'email'
		]);

		$result = $validate->batch()->check($data);
		//var_dump($validate->getError());
		if($result){

		}
	}
}