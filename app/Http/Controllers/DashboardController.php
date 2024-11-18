<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ProductionOrder;
use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $Sale = Sale::where('payment_st', 1)->get();
        $Production = ProductionOrder::get();
        $Expense = Expense::get();


        $totalSale = $Sale->sum('total_item_price');
        $product_deli = $Sale->sum('shipping_fee')+$Production->sum('shipping_cost');
        $total_price = $Production->sum('total_price');
        $Expense_total = $Expense->sum('amount');
        $total = $Expense_total+$total_price+$product_deli;


        return view('Admin.Dashboard.index',[
            'totalSale'=>$totalSale,
            'product_deli'=>$product_deli,
            'total_price'=>$total_price,
            'total'=>$total,
            'Expense_total'=>$Expense_total,
        ]);
    }
}
