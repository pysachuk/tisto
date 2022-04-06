<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class ViewOrder extends Component
{
    public $order;

    protected $listeners = ['approve', 'reject'];

    public function mount(Order $order)
    {
        $this->order = $order;
    }


    public function approveConfirm(Order $order)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'info',
            'title' => 'Прийняти замовлення?',
            'text' => '',
            'emit' => 'approve',
            'id' => $order->id,
        ]);
    }

    public function approveReject(Order $order)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'info',
            'title' => 'Відхилити замовлення?',
            'text' => '',
            'emit' => 'reject',
            'id' => $order->id,
        ]);
    }

    public function approve(Order $order)
    {
        $order->update(['status' => Order::STATUS_APPROVED]);
        $this->order = $order;

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Успіх',
            'text' => 'Замовлення прийнято',
        ]);
    }

    public function reject(Order $order)
    {
        $order->update(['status' => Order::STATUS_REJECTED]);
        $this->order = $order;
        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'info',
            'title' => 'Успіх',
            'text' => 'Замовлення відхилено',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.view-order')
            ->extends('shop.layouts.admin.main_layout')
            ->section('content');
    }
}
