<?php

namespace Modules\FeedBack\Repositories;

interface FeedbackRepository {

    /**
     * Get FeedBack
     * @param  integer  $perPage
     * @param  array   $filter
     * @param  array   $sort
     * @param  boolean $paginate
     * @return mixed
     */
    public function get($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true);
}