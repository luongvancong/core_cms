<?php

namespace Nht\Hocs\Transporters;

interface TransporterRepository {
    /**
     * Get transporters
     * @param  integer $perPage
     * @param  array   $filter
     * @param  array   $sort
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getTransporters($perPage = 20, array $filter = array(), array $sort = array(), bool $paginate = true);


    /**
     * Save images
     * @param  Nht\Hocs\Transporters\Transporter $transporter
     * @param  array  $images
     * @return mixed
     */
    public function saveImages($transporter, array $images);
}