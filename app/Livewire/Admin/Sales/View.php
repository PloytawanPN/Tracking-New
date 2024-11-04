<?php

namespace App\Livewire\Admin\Sales;

use App\Models\Sale;
use App\Models\SaleItem;
use Crypt;
use Livewire\Component;

class View extends Component
{
    public $code,$invoid_data,$payment_st,$ship_address,$shipping_company,$order_date,$shipping_date,$itemList;
    public function mount($id)
    {
        $orderId = Crypt::decryptString($id);
        $this->code = $orderId;
    }
    public function render()
    {
        
        $this->invoid_data = Sale::where('invoice_code',$this->code)->first();
        $this->payment_st =$this->invoid_data->payment_st;
        $this->ship_address =$this->invoid_data->shipping_address;
        $this->shipping_company=$this->invoid_data->shipping_company;
        $this->order_date = \Carbon\Carbon::parse($this->invoid_data->order_at)->format('Y-m-d');
        $this->shipping_date = \Carbon\Carbon::parse($this->invoid_data->shipping_at)->format('Y-m-d');

        $this->itemList = SaleItem::where('invoice_id',$this->invoid_data->id)->get();
        return view('livewire.admin.sales.view');
    }
}
