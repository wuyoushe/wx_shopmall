<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 18:10
 */
namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePositiveInt;
use app\api\validate\PagingParameter;
use app\lib\exception\ParameterException;
use app\lib\exception\ProductException;
use app\lib\exception\ThemeException;
use think\Controller;
use think\Exception;
use think\Request;

class Product extends Controller
{

    protected $beforeActionList = [
        'checkSuperScope'   =>  ['only' => 'createOne,deleteOne']
    ];

    /**
     * 根据类目ID获取该类目下的所有的商品(分页)
     * @url /product?id = :category_id&page=:page&size=:page_size
     * @param int $id 商品id
     * @param int $page 分页页数
     * @parma int $size 每页数目
     * @return array of object
     * @throws ParameterException
     */
    public function getByCategory($id = -1,$page = 1, $size = 30)
    {
        (new IDMustBePositiveInt())->goCheck();
        (new PagingParameter())->goCheck();
        $pagingProducts = ProductModel::getProductsByCategoryID(
            $id, true, $page, $size);
        if ($pagingProducts->isEmpty())
        {
            return [
                'current_page'  =>  $pagingProducts->currentPage(),
                'data'          =>  []
            ];
        }

        $data = $pagingProducts->hidden(['summary'])->toArray();

        return [
          'current_page'  => $pagingProducts->currentPage(),
            'data' => $data
        ];
    }
    /**
     * 获取某分类下全部商品
     * @url /product/all?id =:category_id
     * @param int $id 分类id号
     * @param \think\Paginator
     * @throws ThemeException
     */
    public function getAllInCategory($id = -1)
    {
        (new IDMustBePositiveInt())->goCheck();
        $products = ProductModel::getProductsByCategoryID($id, false);
        if ($products->isEmpty())
        {
            throw new ThemeException();
        }
        $data = $products
            ->toArray();
        return $data;
    }
    /**
     * 获取指定数量的最近商品
     * @url /prodcut/recent?count=:count
     * @param int $count
     * @return mixed
     * @throw ParameterException
     */
    public function getRecent($count = 15)
    {
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
//        $products = $products->toArray();
        if (!$products) {
            throw new ProductException();
        }
        //利用collection数据集来临时处理
        $collection = collection($products);
        $products = $collection->hidden(['summary']);
        return $products;
    }
    /**
     * 获取商品详情
     * 如果商品详情信息很多，需要考虑分多个接口分布加载
     * @url /product/:id
     * @return Product
     * @throws ProductException
     */
    public function getOne($id)
    {
        (new IDMustBePositiveInt())->goCheck();
        $product = ProductModel::getProductDetail($id);
        if (!$product) {
            throw new ProductException();
        }
        return $product;
    }

    public function createOne()
    {
        $product = new ProductModel();
        $product->save([
            'id'    => 1
        ]);
    }

    public function deleteOne($id)
    {
        ProductModel::destroy($id);
    }

}



























