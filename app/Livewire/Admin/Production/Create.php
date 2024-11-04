<?php

namespace App\Livewire\Admin\Production;

use App\Models\OrderList;
use App\Models\ProductionOrder;
use App\Models\qr_codes;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $order_id, $petcodeList, $start_code, $last_code;

    public $order_list = [];

    public $order_name ,$order_detail,$order_channel,$ProductQuantity,$total_price,$unit_price,$shipping_cost,$order_date,$received_date,$code_list;

    public function create_order(){
        try {
            $this->validate([
                'order_id' => 'required|unique:production_order,order_id',
                'order_list' => 'required',
                'order_name' => 'required',
                'order_channel' => 'required',
                'ProductQuantity' => 'required|numeric',
                'total_price' => 'required|numeric',
                'unit_price' => 'required|numeric',
                'shipping_cost' => 'required|numeric',
                'order_date' => 'required',
                'received_date' => 'required',
            ]);

            $productionOrder = ProductionOrder::create([
                'order_id' => $this->order_id,
                'order_name' => $this->order_name,
                'order_detail' => $this->order_detail,
                'order_channel' => $this->order_channel,
                'order_quantity' => $this->ProductQuantity,
                'total_price' => $this->total_price,
                'unit_price' => $this->unit_price,
                'shipping_cost' => $this->shipping_cost,
                'order_at' => $this->order_date,
                'received_at' => $this->received_date,
            ]);


            foreach ($this->order_list as $key => $value) {
                OrderList::create([
                    'production_order_id' => $productionOrder->id,
                    'pet_code' => $value['pet_code'],
                ]);

                qr_codes::where('pet_code', $value['pet_code'])->update(['produce_st' => 1,'produce_at'=>Carbon::now()]);
            }

            $this->dispatch('createdSuccess', [
                'message' => 'New order successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('orderFalse', [
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function mount()
    {
        $productionList = ProductionOrder::orderBy('id', 'desc')->first();

        if (!$productionList) {
            $this->order_id ='ORDER-000001';
        } else {
            $orderNumber = $productionList->order_id;
            $numberPart = explode('-', $orderNumber)[1];
            $newNumber = str_pad((int) $numberPart + 1, 6, '0', STR_PAD_LEFT);
            $this->order_id = 'ORDER-' . $newNumber;
        }
    }

    public function addOrder()
    {
        try {
            $this->validate([
                'start_code' => 'required',
            ]);

            if ($this->start_code && $this->last_code) {
                $this->petcodeList = qr_codes::where('export_st',1)->where('pet_code', '>=', $this->start_code)->where('pet_code', '<=', $this->last_code)->get();
            } else {
                $this->petcodeList = qr_codes::where('export_st',1)->where('pet_code', $this->start_code)->get();
            }

            if (count($this->petcodeList) == 0) {
                $this->dispatch('orderFalse', [
                    'message' => 'Not found pet code',
                ]);
            } else {
                foreach ($this->petcodeList as $key => $value) {
                    $this->order_list[$value->id] = [
                        'id' => $value->id,
                        'pet_code' => $value->pet_code,
                    ];
                }

                $this->dispatch('orderCreated', [
                    'message' => 'New Account created successfully!',
                ]);
            }


        } catch (\Throwable $th) {
            $this->dispatch('orderFalse', [
                'message' => $th->getMessage(),
            ]);
        }

    }

    public function removeRow($id)
    {
        unset($this->order_list[$id]);
    }

    public function render()
    {
        $this->ProductQuantity = count($this->order_list);
        if (!$this->ProductQuantity || $this->ProductQuantity == 0) {
            $this->unit_price = round($this->total_price, 2);
        } else {
            $this->unit_price = round($this->total_price / $this->ProductQuantity, 2);
        }
        $this->code_list = qr_codes::where('export_st',1)->get();
        return view('livewire.admin.production.create');
    }
}
