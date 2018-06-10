<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/30
 * Time: 23:08
 */
namespace app\api\controller\v1;

use app\api\model\Theme as ThemeModel;
use app\api\validate\IDCollection;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\ThemeProduct;
use app\lib\exception\successMessage;
use app\lib\exception\ThemeException;
use think\Controller;
use think\Exception;
use think\Request;

/**
 * 主题推荐，主题指首页里多个聚集在一起的商品
 * 注意同专题区分
 * 常规的REST服务创建成功后，需要在Response的header里附加成功创建资源URL，但是这种
 * 方式在内部开发中并不常用，所以本项目不采用这种方式
 */
class Theme extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
    }

    /**
     * @url     /theme?ids = :id1,id2,id3
     * @return  array of theme
     * @throws ThemeException
     */
    public function getSimpleList($ids = '')
    {
        $validate = new IDCollection();
        $validate->goCheck();
        $ids = explode(',', $ids);
        //查询结果集
        $result = ThemeModel::with('topicImg,headImg')->select($ids);

        if (!$result) {
            throw new ThemeException();
        }
        return $result;
    }

    public function getComplexOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if (!$theme) {
            throw new ThemeException();
        }
        //隐藏一些字段后返回
        return $theme->hidden(['products.summary'])->toArray();
    }

    /**
     * @url /theme/:t_id/product/:p_id
     * @Http POST
     * @return SuccessMessage or Exception
     */
    public function addThemeProduct($t_id, $p_id)
    {
        $validate = new ThemeProduct();
        $validate->goCheck();
        ThemeModel::addThemeProduct($t_id, $p_id);
        return new SuccessMessage();
    }

    /**
     * @url /theme/:t_id/product/:p_id
     * @Http DELETE
     * @return SuccessMessage or Exception
     */
    public function deleteThemeProduct($t_id, $p_id)
    {
        $validate = new ThemeProduct();
        $validate->goCheck();
        $themeID = (int)$t_id;
        $productID = (int)$p_id;
        ThemeModel::deleteThemeProduct($themeID, $productID);
        return new SuccessMessage([
            'code' => 204
        ]);
    }
}














