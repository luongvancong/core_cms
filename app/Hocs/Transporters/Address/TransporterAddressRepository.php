<?php
namespace Nht\Hocs\Transporters\Address;

use Nht\Hocs\Core\BaseRepository;

class TransporterAddressRepository extends BaseRepository {

    public function __construct(Address $model)
    {
        $this->model = $model;
    }


}