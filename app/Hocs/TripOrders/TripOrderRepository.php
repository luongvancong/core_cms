<?php

namespace Nht\Hocs\TripOrders;

use DB;
use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\TripOrders\TripOrderDetail;

class TripOrderRepository extends BaseRepository {

    /**
     * Model
     * @var \Nht\Hocs\TripOrders\TripOrder
     */
    protected $model;

    public function __construct(TripOrder $model)
    {
        $this->model = $model;
    }

    public function getOrders($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true)
    {
        $query = $this->model->whereRaw(1)
                             ->selectRaw("trip_orders.*");

        $customerName  = array_get($filter, 'customer_name');
        $customerEmail = array_get($filter, 'customer_email');
        $customerPhone = array_get($filter, 'customer_phone');
        $code          = array_get($filter, 'code');
        $startDate     = array_get($filter, 'start_date');
        $status        = array_get($filter, 'status', 100);
        $type          = (int) array_get($filter, 'type');

        if($customerName) {
            $query->where('customer_name', $customerName);
        }

        if($customerEmail) {
            $query->where('customer_email', $customerEmail);
        }

        if($customerPhone) {
            $query->where('customer_phone', $customerPhone);
        }

        if($code) {
            $query->where('code', $code);
        }

        if($startDate) {
            $query->where('trips.start_date', '>=', $startDate);
        }

        if($status != 100 && $status != '') {
            $query->where('status', $status);
        }

        if($type > 0) {
            $query->where('type', $type);
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


    /**
     * Tong gia tri don hang
     * @param  array  $filter
     * @return int
     */
    public function sumTotalMoney(array $filter = array())
    {
        $query = $this->model->whereRaw(1);

        return $query->sum('total_money');
    }


    public function releaseOrderByTripId($tripId)
    {
        // Kiểm tra có đơn hàng nào tạo lâu rồi mà chưa thanh toán thì nhả chỗ
        // cho khách hàng khác
        $configOrderExpired = config('order_expired');

        $details = TripOrderDetail::where('trip_id', $tripId)->get();
        $orderIds = [];
        foreach($details as $item) {
            $orderIds[] = $item->order_id;
        }

        $orders = $this->model->whereIn('id', $orderIds)->get();

        foreach($orders as $order) {
            $unixTime = strtotime($order->created_at);
            if(time() - $unixTime > $configOrderExpired['time']) {
                // Nhả ghế
                DB::table('trip_order_picked_seats')
                   ->where('order_id', $order->id)
                   ->where('trip_id', $tripId)
                   ->delete();

                $order->delete();
            }
        }
    }


    /**
     * Save order detail
     * @param  array  $data
     * @return int
     */
    public function saveOrderDetail(array $data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->model->detail()->insertGetId($data);
    }
}