<?php

namespace App\Repositories\Interfaces;


use App\Http\Requests\AddOrderRequest;

interface OrderRepositoryInterface
{
    public function getOrdersByStatus($status, $paginate = null);
    public function approveOrder($id);
    public function rejectOrder($id);
    public function getCurrentMonthAcceptedOrders();
    public function getCurrentMonthAcceptedOrdersCount();
    public function getNewOrdersCount();
    public function getCurrentMonthSumm();
    public function getTotalAmount();
    public function addOrder(AddOrderRequest $request, $products);

}
