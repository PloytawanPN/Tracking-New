<?php

namespace App\Livewire\Admin\Production;

use App\Models\ProductionOrder;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public function render()
    {

        $query = ProductionOrder::orderBy('id');
        if ($this->search) {
            $query->orwhere('order_id', 'like', '%' . $this->search . '%');
            $query->orwhere('order_name', 'like', '%' . $this->search . '%');
            $query->orwhere('order_quantity', 'like', '%' . $this->search . '%');
            $query->orwhere('total_price', 'like', '%' . $this->search . '%');
        }
        $datalist = $query->paginate(15);

        return view('livewire.admin.production.order-list', [
            'datalist' => $datalist
        ]);
    }
}
