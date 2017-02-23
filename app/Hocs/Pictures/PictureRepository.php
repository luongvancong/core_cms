<?php namespace Nht\Hocs\Pictures;

interface PictureRepository {

    public function getById($id);

    public function getPaginated($perPage = 20, array $filterArray = array());

    public function updateActive($id);

    public function deleteById($id);

    public function getByProductId($productId);

}
