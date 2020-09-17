<?php

namespace App\Services\Orders;

use App\Models\City;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\OrderStore;
use App\Services\BaseService;


class OrdersFetshDataService extends BaseService
{
    const IMAGE_PATH = 'orders/';
    private $order;

    public function __construct(Order $order){

        $this->order = $order;

    }
    public function getAllOrders()
    {
        $orders = $this->order::with('shipping' , 'sender:id,fullname,city_id' , 'sender.city')->paginate(12);

        //  return $orders;

        return view('order.index' , [
           'orders' => $orders
        ]);
    }

    public function createNewOrder()
    {
        $userData = app(OrderSaveUserDataToSession::class)->handle(request('page'));

        return view('order.create', array_merge($this->getAllGovernoratesAndCities(), ['userData' => $userData]));
    }

    public function editCityPriceRow($id)
    {
        $city = $this->city::where('id', $id)->first();
        return view('place-prices.edit', [
            'city_price'       => $city->placePrices,
            'city_name'        => $city->name,
            'governorate_name' => $city->governorate->name,
        ]);
    }

}
