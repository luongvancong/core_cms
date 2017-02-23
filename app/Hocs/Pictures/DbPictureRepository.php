<?php namespace Nht\Hocs\Pictures;

use Nht\Hocs\Pictures\PictureRepository;

use Xss;

class DbPictureRepository implements PictureRepository {

    function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }

    public function getById($id)
    {
        return $this->picture->where('id', '=', $id)->first();
    }

    public function updateActive($id)
    {
        $picture = $this->getById($id);
        $value = abs( $picture->active - 1 );
        $picture->active = $value;
        $picture->save();
        return $picture;
    }

    public function getPaginated($perPage = 20, array $filterArray = array())
    {
        $name = Xss::clean(array_get($filterArray, 'name'));
        $id = (int) array_get($filterArray, 'id');

        $picture = $this->picture->with('products');

        $picture->select("product_images.*")->join('products', 'products.id', '=', "product_images.product_id");

        if($id) {
            $picture->where('products.id', '=', $id);
        }
        if($name) {
            $picture->where('products.name', 'LIKE', '%'. $name .'%');
        }

        return $picture->orderBy('product_images.id', 'desc')->paginate($perPage);
    }

    public function deleteById($id)
    {
        $picture = $this->getById($id);
        return $picture->delete();
    }

    public function getByProductId($productId)
    {
        $picture = $this->picture->select("product_images.*")
            ->join('products', 'products.id', '=', 'product_images.product_id')
            ->where('products.id', '=', $productId)
            ->where('product_images.active', '=', Picture::ACTIVE)->get();
        return $picture;
    }

}
