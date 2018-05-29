<?php 
namespace app\api\model;

use think\Model;
use traits\model\SoftDelete;

class BaseModel extends Model
{
	//软删除，设置后在查询时要特别注意whereor
	//使用whereOr会将设置了软删除的记录也查询处来

	use softDelete;

	/**/
	protected $hidden = ['delete_time'];

	protected function prefixImgUrl($value, $data)
	{
		$finalUrl = $value;
		if($data['from'] == 1)
		{
		    //读取自定义的配置文件 extra目录下的可以直接config读取
            //拼接url
			$finalUrl = config('setting.img_prefix').$value;
		}
		return $finalUrl;
	}
}