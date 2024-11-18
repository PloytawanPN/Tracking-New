<?php

namespace App\Livewire\Admin\Production;

use App\Models\ProductionOrder;
use App\Models\qr_codes;
use Carbon\Carbon;
use Crypt;
use Livewire\Component;
use App\Models\OrderList;

class Edit extends Component
{ 
    public $order_id, $petcodeList, $start_code, $last_code;

    public $order_list = [],$id;

    public $order_name ,$order_detail,$order_channel,$ProductQuantity,$total_price,$unit_price,$shipping_cost,$order_date,$received_date,$code_list;

    public function mount($id)
    {
        $orderId = Crypt::decryptString($id);
        $this->id = $orderId;

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
        $this->received_date = $this->OrderDetail->received_at?\Carbon\Carbon::parse($this->OrderDetail->received_at)->format('Y-m-d'):null;

        $this->order_list = OrderList::where('production_order_id',$this->OrderDetail->id)->get();
    }

    public function update_order(){
        try {
            $this->validate([
                'order_list' => 'required',
                'order_name' => 'required',
                'order_channel' => 'required',
                'ProductQuantity' => 'required|numeric',
                'total_price' => 'required|numeric',
                'unit_price' => 'required|numeric',
                'shipping_cost' => 'required|numeric',
                'order_date' => 'required',
            ]);

            $productionOrder = ProductionOrder::where('order_id',$this->id)->update([
                'order_id' => $this->order_id,
                'order_name' => $this->order_name,
                'order_detail' => $this->order_detail,
                'order_channel' => $this->order_channel,
                'order_quantity' => $this->ProductQuantity,
                'total_price' => $this->total_price,
                'unit_price' => $this->unit_price,
                'shipping_cost' => $this->shipping_cost,
                'order_at' => $this->order_date,
                'received_at' => $this->received_date!=''?$this->received_date:null,
            ]);

            $this->dispatch('createdSuccess', [
                'message' => 'Update order successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('orderFalse', [
                'message' => $th->getMessage(),
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.production.edit');
    }
}
