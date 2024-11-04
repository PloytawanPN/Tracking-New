<?php

namespace App\Livewire\Admin\Expenses;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;


class ExpensesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $expense_name,$amount,$payment_date,$payment_method,$search;

    public function add_expense(){
        try {
            $this->validate([
                'expense_name' => 'required',
                'amount' => 'required|numeric',
                'payment_date' => 'required',
                'payment_method' => 'required',
            ]);
            $expense = Expense::create([
                'expense_name' => $this->expense_name,
                'amount' => $this->amount,
                'payment_date' => $this->payment_date,
                'payment_method' => $this->payment_method,
            ]);
            $this->dispatch('expenseCreated', [
                'message' => 'New Expense created successfully!',
            ]);
        } catch (\Throwable $th) {
            $this->dispatch('expenseFalse', [
                'message' => $th->getMessage(),
            ]);
        }
        
    }
    public function render()
    {
        $query = Expense::orderBy('id');
        if ($this->search) {
            $query->orwhere('expense_name', 'like', '%' . $this->search . '%');
            $query->orwhere('amount', 'like', '%' . $this->search . '%');
            $query->orwhere('payment_date', 'like', '%' . $this->search . '%');
            $query->orwhere('payment_method', 'like', '%' . $this->search . '%');
        }
        $dataList = $query->paginate(15);
        return view('livewire.admin.expenses.expenses-list',['datalist'=>$dataList]);
    }
}
