<?php

namespace App\Livewire\Admin\Sales;

use App\Models\qr_codes;
use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use Crypt;
use Livewire\Component;

class Edit extends Component
{
    public $code;

    public $product_list, $product_code, $product_price, $quantity, $total_price, $invoice_code;
    public $name, $lastname, $phone, $order_date, $payment_st, $shipping_company, $shipping_date, $tracking_number, $address, $shipping_fee, $total;
    public $itemList = [];

    public $data;

    public function create_invoice()
    {
        try {
            $this->validate([
                'invoice_code' => 'required',
                'name' => 'required',
                'lastname' => 'required',
                'phone' => 'required',
                'order_date' => 'required',
                'payment_st' => 'required',
                'itemList' => 'required',

            ]);

            Sale::where('invoice_code',$this->code)->update([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'phone' => $this->phone,
                'order_at' => $this->order_date,
                'payment_st' => $this->payment_st,
                'quantity' => $this->quantity,
                'total_item_price' => $this->total_price,
                'shipping_company' => $this->shipping_company,
                'shipping_at' => $this->shipping_date,
                'tracking_number' => $this->tracking_number,
                'shipping_address' => $this->address,
                'shipping_fee' => $this->shipping_fee,
                'total_w_shipping' => $this->total,
            ]);

            $updateSale = Sale::where('invoice_code',$this->code)->first();

            SaleItem::where('invoice_id', $updateSale->id)->delete();

            foreach ($this->itemList as $key => $value) {
                SaleItem::create([
                    'invoice_id' => $updateSale->id,
                    'product_code' => $value['code'],
                    'price' => $value['price'],
                ]);
                qr_codes::where('pet_code', $value['code'])->update(['sold_st' => 1, 'sold_at' => Carbon::now()]);
            }

            $this->dispatch('createdSuccess', [
                'message' => 'New Invoice created successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('orderFalse', [
                'message' => $th->getMessage(),
            ]);
        }
    }

    public function mount($id)
    {
        $orderId = Crypt::decryptString($id);
        $this->code = $orderId;

        $this->data = Sale::where('invoice_code',$this->code)->first();
        $itemdata = SaleItem::where('invoice_id',$this->data->id)->get();

        foreach ($itemdata as $key => $value) {
            $this->itemList[$value->product_code] = ['code' => $value->product_code, 'price' => $value->price];
        }

        $this->invoice_code = $this->code;
        $this->name = $this->data->name;
        $this->lastname = $this->data->lastname;
        $this->phone = $this->data->phone;
        $this->payment_st = $this->data->payment_st;
        $this->quantity = $this->data->quantity;
        $this->total_price = $this->data->total_item_price;
        $this->shipping_company = $this->data->shipping_company;
        $this->tracking_number = $this->data->tracking_number;
        $this->address = $this->data->shipping_address;
        $this->shipping_fee = $this->data->shipping_fee;
        $this->total = $this->data->total_w_shipping;
        $this->order_date = Carbon::parse($this->data->order_at)->format('Y-m-d');
        $this->shipping_date = Carbon::parse($this->data->shipping_at)->format('Y-m-d');

    }

    public function addItem()
    {
        try {
            $this->validate([
                'product_code' => 'required',
                'product_price' => 'required',
            ]);
            $this->itemList[$this->product_code] = ['code' => $this->product_code, 'price' => $this->product_price];
            $this->dispatch('orderCreated', [
                'message' => 'New item created successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('orderFalse', [
                'message' => $th->getMessage(),
            ]);
        }

    }
    public function removeRow($id)
    {
        unset($this->itemList[$id]);
    }
    public function render()
    {
        $this->quantity = count($this->itemList);
        $this->total_price = array_reduce($this->itemList, function ($carry, $item) {
            return $carry + (int) $item['price']; // แปลงราคาเป็นจำนวนเต็ม
        }, 0);
        if ($this->shipping_fee) {
            $this->total = $this->total_price + $this->shipping_fee;
        } else {
            $this->total = $this->total_price;
        }

        $this->product_list = qr_codes::where('produce_st', 1)->get();
        return view('livewire.admin.sales.edit');
    }
}
