<?php namespace Nht\Hocs\Sites;

use Nht\Hocs\Products\Product;

interface SiteRepository {
	public function getByIds(array $ids);

    public function getHots($take = 20);

    public function getPaginated($perPage = 20, array $withs = array(), array $filterArray = array(), array $sortArray = array());

    public function saveLinks(Site $site, array $data);

    /**
     * Lấy 1 số cửa hàng bán sản phẩm này
     * @param  Product $product
     * @return Collection
     */
    public function getShopHasProduct(Product $product, $take = 5);

    public function getShopsByNames(array $names);

    public function getShopsByNamesPaginated(array $names, $perPage = 20);

    public function getNewest($take = 20);

    public function resetEnvTesting();

    public function updateTotalLinks();

    public function countPageByDay($day);

    public function resetEnvQuick();


    public function getAllParents();

    public function getAllBranchs(Site $site);

    public function getProducts(Site $site, $take = 15);

    public function getParentsPaginate($perPage = 20);

    public function countParent();


    /**
     * Đếm số lượng đánh giá gian hàng theo sản phẩm
     * @param  int $merchantId
     * @return int
     */
    public function countRate($merchantId);



    /**
     * Lấy giá trị đánh giá trung bình của gian hàng với sản phẩm
     * @param  int $merchantId
     * @return int
     */
    public function getAvgRate($merchantId);


    /**
     * Đếm lượt xem sản phẩm của gian hàng này
     * @param  int $merchantId
     * @return int
     */
    public function countView($merchantId);


    /**
     * Đếm số lần bị báo sai thông tin của gian hàng này với sản phẩm này
     * @param  int $merchantId
     * @return int
     */
    public function countWrongInfo($merchantId);


    /**
     * Đếm số lần báo sai giá trên từng sản phẩm của gian hàng
     * @param  int $merchantId
     * @param  int $productId
     * @return int
     */
    public function countWrongPrice($merchantId);
}