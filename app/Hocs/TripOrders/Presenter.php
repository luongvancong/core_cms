<?php

namespace Nht\Hocs\TripOrders;


class Presenter {
    public function __construct(TripOrder $order)
    {
        $this->order = $order;
    }

    public function getPrice()
    {
        return formatCurrency($this->order->getPrice());
    }

    public function getTotalMoney()
    {
        return formatCurrency($this->order->getTotalMoney());
    }

    public function getPaymentMethod()
    {
        $map = [
            0 => 'Tiền mặt',
            1 => 'Chuyển khoản ngân hàng'
        ];

        return isset($map[$this->order->getPaymentMethod()]) ? $map[$this->order->getPaymentMethod()] : 'Không xác định';
    }


    public function getStatus()
    {
        $map = [
            0 => 'Đang đặt chỗ',
            1 => 'Hoàn thành'
        ];

        $status = $this->order->getStatus();

        return isset($map[$status]) ? $map[$status] : 'Không xác định';
    }

    public function getType()
    {
        $map = [
            1 => 'Một chiều',
            2 => 'Hai chiều'
        ];

        $type = $this->order->getType();

        return isset($map[$type]) ? $map[$type] : 'Không xác định';
    }
}