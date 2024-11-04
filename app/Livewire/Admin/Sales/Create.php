<?php

namespace App\Livewire\Admin\Sales;

use App\Models\ProductionOrder;
use App\Models\qr_codes;
use App\Models\Sale;
use App\Models\SaleItem;
use Carbon\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $product_list, $product_code, $product_price, $quantity, $total_price, $invoice_code;
    public $name, $lastname, $phone, $order_date, $payment_st, $shipping_company, $shipping_date, $tracking_number, $address, $shipping_fee, $total;
    public $itemList = [];

    public function create_invoice()
    {
        try {
            $this->validate([
                'invoice_code' => 'required|unique:sales,invoice_code',
                'name' => 'required',
                'lastname' => 'required',
                'phone' => 'required',
                'order_date' => 'required',
                'payment_st' => 'required',
                'itemList' => 'required',

            ]);

            $NewSale = Sale::create([
                'invoice_code' => $this->invoice_code,
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

            foreach ($this->itemList as $key => $value) {
                SaleItem::create([
                    'invoice_id' => $NewSale->id,
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

    public function mount()
    {
        $saleList = Sale::orderBy('id', 'desc')->first();

        if (!$saleList) {
            $this->invoice_code = 'INVOICE-000001';
        } else {
            $orderNumber = $saleList->invoice_code;
            $numberPart = explode('-', $orderNumber)[1];
            $newNumber = str_pad((int) $numberPart + 1, 6, '0', STR_PAD_LEFT);
            $this->invoice_code = 'INVOICE-' . $newNumber;
        }
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
        return view('livewire.admin.sales.create');
    }
}
