<?php

namespace App\Livewire\Admin\Production;

use App\Models\OrderList;
use App\Models\ProductionOrder;
use Livewire\Component;
use Illuminate\Support\Facades\Crypt;

class View extends Component
{

    public $id,$OrderDetail,$order_id,$order_name,$order_detail,$order_channel,$ProductQuantity;
    public $total_price,$unit_price,$shipping_cost,$order_date,$received_date;
    public $order_list;
    public function mount($id)
    {
        $orderId = Crypt::decryptString($id);
        $this->id = $orderId;
    }

    public function render()
    {
        $this->OrderDetail = ProductionOrder::where('order_id',$this->id)->first();
        $this->order_id = $this->OrderDetail->order_id;
        $this->order_name = $this->OrderDetail->order_name;
        $this->order_detail = $this->OrderDetail->order_detail;
        $this->order_channel = $this->OrderDetail->order_channel;
        $this->ProductQuantity = $this->OrderDetail->order_quantity;
        $this->total_price = $this->OrderDetail->total_price;
        $this->unit_price = $this->OrderDetail->unit_price;
        $this->shipping_cost = $this->OrderDetail->shipping_cost;
        $this->order_date = \Carbon\Carbon::parse($this->OrderDetail->order_at)->format('Y-m-d');
        $this->received_date = \Carbon\Carbon::parse($this->OrderDetail->received_at)->format('Y-m-d');

        $this->order_list = OrderList::where('production_order_id',$this->OrderDetail->id)->get();

        return view('livewire.admin.production.view');
    }
}
