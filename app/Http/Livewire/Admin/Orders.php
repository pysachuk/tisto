<?php

namespace App\Http\Livewire\Admin;

use App\Models\Location;
use App\Models\Order;
use App\Services\Order\OrderService;
use App\Services\Payment\Fondy\FondyService;
use Livewire\Component;

class Orders extends Component
{
    public $status;
    public $isAdmin;
    public $locations;
    public $selectedLocation;

    public function mount($status)
    {
        $fondy = resolve(FondyService::class);
        dd($fondy->getPaymentUrl(Order::find(11)));
        $this->locations = Location::get();
        $this->isAdmin = auth()->user()->role->role === 'admin';
        $this->status = $status;
        $this->setSelectedLocation();
    }

    public function setSelectedLocation()
    {
        if($this->selectedLocation === null) {
            if(! session('selected_location')) {
                $this->selectedLocation = $this->locations->first()->key ?? null;
            } else {
                $this->selectedLocation = session('selected_location');
            }

        }
        if(session('selected_location') !== $this->selectedLocation) {
            session()->put(['selected_location' => $this->selectedLocation]);
            session()->save();
        }
    }

    public function updatedSelectedLocation()
    {
        $this->setSelectedLocation();
    }

    public function render()
    {
        $orderService = resolve(OrderService::class);
        $orders = $orderService->getOrders($this->status, 15, $this->selectedLocation);

        return view('livewire.admin.orders', compact('orders'))
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
