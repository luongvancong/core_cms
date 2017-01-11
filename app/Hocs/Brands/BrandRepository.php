<?php namespace Nht\Hocs\Brands;

interface BrandRepository {
	public function getBrands($perPage = 25, $filterArray = array());
	public function getAllBrands();
    public function getByName($name);
    public function getBySlug($slug);
    public function getBySlugOrFail($slug);

    public function searchByName($name);

    /**
     * Lấy tất cả các hsx có sp
     * @return Collection
     */
    public function getAllBrandHasProduct();
}