<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 19/12/16
 * Time: 20:52
 */

namespace Nht\Hocs\Trips;


use Nht\Hocs\Core\BaseRepository;

class TripRepository extends BaseRepository
{
    public function __construct(Trip $model)
    {
        $this->model = $model;
    }

    /**
     * Get trips
     * @param  int       $perPage
     * @param  array        $filter
     * @param  array        $sort
     * @param  boolean $paginate
     * @return mixed
     */
    public function getTrips($perPage, array $filter = array(), array $sort = array(), $paginate = true)
    {
        $query = $this->model->whereRaw(1);
        $query->join('cities as city1', 'start_place', '=', 'city1.cit_id');
        $query->join('cities as city2', 'end_place', '=', 'city2.cit_id');
        $query->selectRaw('trips.*, city1.cit_name as start_place_name, city2.cit_name as end_place_name');

        // Filter params
        $startPlace   = array_get($filter, 'start_place', array());
        $endPlace     = array_get($filter, 'end_place', array());
        $startAddress = clean(array_get($filter, 'start_address'));
        $endAddress   = clean(array_get($filter, 'end_address'));
        $price        = (int) array_get($filter, 'price');
        $numTicket    = (int) array_get($filter, 'num_ticket');
        $startDate    = clean(array_get($filter, 'start_date'));
        $endDate      = clean(array_get($filter, 'end_date'));

        if($startPlace) {
            $query->whereIn('start_place', (array) $startPlace);
        }

        if($endPlace) {
            $query->whereIn('end_place', (array) $endPlace);
        }

        if($startAddress) {
            $query->where('start_address', 'LIKE', '%'. $startAddress .'%');
        }

        if($endAddress) {
            $query->where('end_address', 'LIKE', '%'. $endAddress .'%');
        }

        if($price) {
            $query->where('price', '=', $price);
        }

        if($numTicket) {
            $query->where('num_ticket', $numTicket);
        }

        if($startDate) {
            $query->where('start_date', '>=', $startDate);
        }

        if($endDate) {
            $query->where('end_date', '<=', $endDate);
        }

        if(!$sort) $sort = ['updated_at' => 'DESC'];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }

        if($paginate) {
            return $query->paginate($perPage);
        }

        return $query->take($perPage)->get();
    }


    public function saveImages(Trip $trip, array $images)
    {
        foreach ($images as $filename) {
            $trip->images()->create([
                'trip_id' => $trip->getId(),
                'image' => $filename
            ]);
        }
    }


    public function getFilterData()
    {
        $query = $this->model->whereRaw(1);
        $query->join('cities as city1', 'start_place', '=', 'city1.cit_id');
        $query->join('cities as city2', 'end_place', '=', 'city2.cit_id');
        $query->selectRaw('DATE_FORMAT(trips.start_date, "%H:%i") as start_hour, trips.start_place as start_place, trips.end_place as end_place, city1.cit_name as start_place_name, city2.cit_name as end_place_name');
        $data = $query->get();

        $startTimeOptions = [];
        $startPlaceOptions = [];
        $endPlaceOptions = [];
        foreach($data as $item) {
            $startTimeOptions[$item->start_hour] = $item->start_hour;
            $startPlaceOptions[$item->start_place] = $item->start_place_name;
            $endPlaceOptions[$item->end_place] = $item->end_place_name;
        }

        return [
            'start_time_options'  => $startTimeOptions,
            'start_place_options' => $startPlaceOptions,
            'end_place_options'   => $endPlaceOptions
        ];
    }


}