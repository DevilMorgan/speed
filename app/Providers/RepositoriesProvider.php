<?php

namespace App\Providers;

use App\Http\Interfaces\CustomerRepositoryInterface;
use App\Http\Interfaces\OrderRepositoryInterface;
use App\Http\Interfaces\OrderStoreFormRequestInterface;
use App\Http\Interfaces\PlaceRepositoryInterface;
use App\Http\Interfaces\ReciverRepositoryInterface;
use App\Http\Repositories\CustomerRepository;
use App\Http\Repositories\Orders\OrderRepository;
use App\Http\Repositories\ReciverRepository;
use App\Http\Repositories\Places\PlaceRepository;
use App\Http\Requests\OrderStoreFormRequestRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OrderStoreFormRequestInterface::class, OrderStoreFormRequestRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(PlaceRepositoryInterface::class, PlaceRepository::class);
        $this->app->bind(ReciverRepositoryInterface::class, ReciverRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }

    public function boot()
    {
        //
    }
}
