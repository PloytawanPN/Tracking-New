<?php

namespace App\Livewire\Admin\Sales;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;


class InvoiceList extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $query = Sale::orderBy('id');
        if ($this->search) {
            $query->orwhere('invoice_code', 'like', '%' . $this->search . '%');
            $query->orwhere('name', 'like', '%' . $this->search . '%');
            $query->orwhere('lastname', 'like', '%' . $this->search . '%');
            $query->orwhere('quantity', 'like', '%' . $this->search . '%');
            $query->orwhere('total_item_price', 'like', '%' . $this->search . '%');
            $query->orwhere('shipping_company', 'like', '%' . $this->search . '%');
            $query->orwhere('shipping_fee', 'like', '%' . $this->search . '%');
        }
        $datalist = $query->paginate(15);
        return view('livewire.admin.sales.invoice-list', [
            'datalist' => $datalist
        ]);
    }
}
