<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Bill;
use App\Detail_Bill;
use DB;
class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get()->count();
        $product = Product::get()->count();
        $bill = Bill::get();
        $total = Bill::sum('total');
        $products = DB::table('detail_bill')
        ->join('product', 'product.id' ,'=', 'detail_bill.id_p')
        ->select('id_p', 'name_prd',
        DB::raw('SUM(quantity) as sum_total'), 
        DB::raw('SUM(amount) as sum_amount'))
        ->groupBy('name_prd', 'id_p')
        ->orderBy('id_b')
        ->paginate(5);
        return view('admin.home.home', [
            'user'=>$user , 
            'product' => $product, 
            'total' =>$total,
            'bill' => Bill::get()->count(),
            'products' => $products
            ]);
    }
}
