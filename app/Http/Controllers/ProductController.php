<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Type;
use App\Publish;
use DateTime;
class ProductController extends Controller
{
    public function search(Request $request){
        $key =  $request['search-prt'];
        $products = Product::where('name_prd', 'LIKE', "%$key%")->paginate(6);
        return view('front-end.pages.products',['products'=> $products, 'key' => $key, 'type' => 'search'] );
    }
    public function searchProduct(Request $request){
        $key =  $request['search'];
        $products = Product::where('name_prd', 'LIKE', "%$key%")->paginate(6);
        $types = Type::get();
        $publishes = Publish::get(); 
        return view('admin.table-manager.product', ['products'=>$products, 'types' =>$types, 'publishes' => $publishes]);
    }
    public function getAddProduct(){
        $types = Type::get();
        $publishes = Publish::get();
        return view('admin.table-add.product', ['types' => $types, 'publishes' => $publishes]);
        //echo $types;
    }
    public function getListProduct(){
        $products = Product::paginate(5);
        $types = Type::get();
        $publishes = Publish::get(); 
        return view('admin.table-manager.product', ['products'=>$products, 'types' =>$types, 'publishes' => $publishes]);
    }
    public function postAddProduct(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:product,name_prd',
            'import_price' => 'required|min:0',
            'price' => 'required|min:0',
            'author' => 'required',
            'num' => 'required:min:0',
            'img' => 'required',
            'publish' =>'required|min:1',
            'type' => 'required|min:1',
            'language' => 'required|min:1',
            'publish_year' => 'required|min:4',
            'description' => 'required',
            'pages' =>  'required|min:0'
        ]);
        $product = new Product();
        $product->name_prd  = $request->name;
        $product->import_price = $request->import_price;
        $product->price = $request->price;
        $product->author = $request->author;
        $product->num = $request->num;
        $product->id_publish = $request->publish;
        $product->id_type = $request->type;
        $product->language= $request->language;
        $product->pages = $request->pages;
        $product->publication_date = $request->publish_year;
        $product->description_prd = $request->description;
        $file = $request->img;
        $name = $file->getClientOriginalName();
        $img = str_random(7) . '_ '. $name;
        $file->move('images',$img);
        $product->img = $img;
        $product->created_at = new DateTime();
        $product->save();
        return redirect()->route('list-product');
    }
    public function getDeleteProduct($id_prd){
        $product = Product::find($id_prd);
        $product->delete();
        return redirect()->route('list-product');
    }
    public function getEditProduct($id_prd){
        $product = Product::find($id_prd);
        $types = Type::get();
        $publishes = Publish::get();
        return view('admin.table-add.product', ['types' => $types, 'publishes' => $publishes, 'product' => $product]);
     
    }
    public function postEditProduct($id_prd, Request $request){
        $product = Product::find($id_prd);
        $this->validate($request, [
            'name' => 'required|unique:product,name_prd,'.$product->id,
            'price' => 'required|min:0',
            'author' => 'required',
            'num' => 'required:min:0',
            'img' => 'required',
            'publish' =>'required|min:1',
            'type' => 'required|min:1',
            'language' => 'required|min:1',
            'publish_year' => 'required|min:4'
        ]); 
        $product->name_prd  = $request->name;
        $product->price = $request->price;
        $product->author = $request->author;
        $product->num = $request->num;
        $product->id_publish = $request->publish;
        $product->id_type = $request->type;
        $product->language= $request->language;
        $product->publication_date = $request->publish_year;
        $file = $request->img;
        $name = $file->getClientOriginalName();
        $img = str_random(7) . '_ '. $name;
        $file->move('images',$img);
        $product->img = $img;
        $product->created_at = new DateTime();
        $product->save();
        return redirect()->route('list-product');
    }
 
}
