<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Bill;
use App\Detail_Bill;
use App\Contact;
use App\Customer;
use DB, Mail;
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
    public function inbox(){
        $contact = Contact::orderBy('id', 'DES')->get();
        return view('admin.pages.contact' , [
            'contact' => $contact
        ]);
    }
    public function rep($id){
        //echo $id;
        return view('admin.pages.rep', ['id'=> $id]);
    }
    public function repinbox($id, Request $request){

        
        $data = [ 'content' => $request->content, 'id' => $id];
        $customer = Contact::find($id);
        $email = $customer->email;
        $title = $request->title;
        Mail::send('admin.pages.mail', $data, function ($smg) use ($email){
            $smg->to($email)->subject($title);
        });
        $customer->status = 1;
        $customer->save();
        return redirect()->route('inbox');
        //Mail::to($customer->email)->send('admin.pages.mail', $data);
    }
}
