<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB,Auth,Cart, Mail, DateTime;
use App\Customer;
use App\Product;
use App\Bill;
use App\Detail_Bill;
use App\Comment;
use App\Contact;
class CustomerController extends Controller
{
    public function login(){
        return view('front-end.pages.login');
    }
    public function register(){
        return view('front-end.pages.register');
    }
    public function postlogin(Request $request){
        $login = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 2
        ];
        if(Auth::attempt($login)) return redirect()->route('home');
        else return redirect()->back();
    }
    public function postregister(Request $request){
        $this->validate($request, [
            'first-name' => 'required',
            'last-name' => 'required',
            'email' => 'required|unique:user,username',
            'password' => 'required',
            'confirm-password' => 'required|same:password',
            'phone' => 'required|min:10|max:11',
            'sex' => 'required',
            'age' => 'required|min:1|max:3',
            'address' => 'required'
        ]);
        $user = new User();
        $user->username = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request['first-name'] .' '. $request['last-name'];
        $user->level = 2;
        $user->save();
        $account = DB::table('user')->where('username', '=', $request->email)->first();
        $customer = new Customer();
        $customer->name = $request['first-name'] .' '. $request['last-name'];
        $customer->email =  $request->email;
        $customer->phone = $request->phone;
        $customer->sex = $request->sex;
        $customer->age = $request->age;
        $customer->address = $request->address;
        $customer->id_user = $account->id;
        $customer->save();
        return redirect()->route('cus-login');
    }
    public function buy(){
        
        if(Auth::check()){
            $id_user = Auth::user()->id;
            $user = DB::table('customer')->where('id_user', '=', $id_user)->first();
            $id = $user->id;
            $products = Cart::content();
            $total = Cart::total();
            $data = ['name' => Auth::user()->name, 'products' => $products , 'user' => $user];
            $bill = new Bill();
            
            // Bill 
            $bill->id_c = $id;
            $bill->total = $total;
            $bill->created_at = new DateTime();
            $bill->save();
          
            foreach($products as $product){
                $detail = new Detail_Bill();
                $detail->id_b = $bill->id;
                $prd = Product::find($product->id);
                $prd->unit_on_order += $product->qty;
                $prd->save();
                $detail->id_p = $product->id;
                $detail->quantity = $product->qty;
                $detail->save();
            }
           

            Mail::send('front-end.pages.mail', $data, function($msg){
                $msg->to(Auth::user()->username)->subject('BookShop');
            });
            //return view('front-end.pages.mail', ['name'=>Auth::user()->name ,'products' => Cart::content()]);
            return redirect()->route('buy-success');
        }
        else return redirect()->route('cus-login');
    }
    public function buysuccess(){
        return view('front-end.pages.success'); 
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
    // public function sendmail(){
    //     if(Auth::check()){
    //         $data = ['name' => Auth::user()->name, 'products' => Cart::content()];
    //         Mail::send('front-end.pages.mail', $data, function($msg){
    //             $msg->to('nts1997z@gmail.com', 'Han Nguyen')->subject('Day la mail cua Sau Nguyen');
    //         });
    //         return redirect()->route('buy-success');
    //     }
    // }
    public function destroyCart(){
        Cart::destroy();
        return redirect()->route('cart');
    }
    public function comment(Request $request, $id){
        $this->validate($request, [
            'comment' => 'required'
        ]);
        if(!Auth::check()) return redirect()->route('cus-login');
        else{
            $customer = DB::table('customer')->where('id_user','=',Auth::user()->id)->first();
    
            $comment = new Comment();
            $comment->id_c = $customer->id;
            $comment->comment = $request->comment;
            $comment->id_p = $id;
            $comment->save();
            return redirect()->back();  
        }
    }

    public function contact(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'messages' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->messages = $request->messages;
        $contact->save();
        return view('front-end.pages.contact-success');
    }
}
