<?php

namespace Nht\Hocs\Cities;

interface CityRepository
{
    public function getDistrictsByCityId($cityId);

    public function getByName($name);
}