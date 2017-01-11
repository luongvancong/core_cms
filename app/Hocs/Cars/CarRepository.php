<?php

namespace Nht\Hocs\Cars;

interface CarRepository {

    /**
     * Get cars
     * @param  integer $perPage
     * @param  array   $filter
     * @param  array   $sort
     * @param  boolean $paginate
     * @return mixed
     */
    public function getCars($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true);
}