<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use DB, Cart;
class HomeController extends Controller
{
    public function getHome(){
        $products = Product::orderby('id' ,'des')->limit(8)->get();
        $bestseller = Product::orderby('unit_on_order', 'des')->limit(3)->get();    
        return view('front-end.pages.home', [ 'products' => $products, 'bestseller' => $bestseller]);
    }
    public function getKind($id){
        $products = DB::table('product')
        ->where('product.id_type','=', $id)->paginate(3);
        return view('front-end.pages.products', [ 'products' => $products, 'id' => $id , 'type' => 'kind']);
    }
    public function getNewBooks(){
        $products = Product::orderBy('name_prd', 'DES')->paginate(6);
        return view('front-end.pages.products', [
            'products' => $products,
            'type' => 'new'
        ]);
    }
    public function getBestBooks(){
        $products = Product::orderBy('unit_on_order', 'DES')->paginate(6);
        return view('front-end.pages.products', [
            'products' => $products,
            'type' => 'bestseller'
        ]);
    }
    public function getProductDetail($id_prd){
        $product = DB::table('product')
        ->join('publish', 'product.id_publish' , '=', 'publish.id')
        ->join('type', 'type.id', '=', 'product.id_type')
        ->where('product.id' , '=', $id_prd)
        ->first();
        $comment = DB::table('comment')
        ->select('customer.name', 'comment.created_at', 'comment')
        ->join('customer', 'customer.id' , '=', 'comment.id_c')
        ->where('comment.id_p', '=', $id_prd)
        ->get();
       return view('front-end.pages.product', ['product'=> $product, 'id' => $id_prd, 'comments'=> $comment]);
    }
    public function getCart($id){
        $product = Product::find($id);
        Cart::add(['id' => $id , 'name' => $product->name_prd , 'qty' => 1,  'price' => $product->price , 'options' => ['img' => $product->img]]);
        return redirect()->route('cart');   
    }
    public function showCart(){
        $products = Cart::content();
      // echo $products;
       return view('front-end.pages.cart', ['products' => $products]);
    }
    public function deleteCart($id){
        Cart::remove($id);
        return redirect()->route('cart');
    }
    public function updateCart($id, $num){
        Cart::update($id, $num);
        return redirect()->route('cart');
    }

}
