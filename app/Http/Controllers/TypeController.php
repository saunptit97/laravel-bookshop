<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;
use DateTime;
class TypeController extends Controller
{
    public function getCate(){
        return view('admin.table-add.cate');
    }
    public function postCate(Request $request){
        $this->validate($request,[
            'name_cate' => 'required|unique:type,name_t',
            'des_cate' => 'required'
        ]);
        $type = new Type();
        $type->name_t = $request->name_cate;
        $type->description = $request->des_cate;
        $type->created_at = new DateTime();
        $type->save();
        return redirect()->route('list-category');
    }
    public function getDele($id_t){
        $type = Type::find($id_t);
        $type->delete();
        return redirect()->route('list-category');
    }
    public function getList(){
        $types = Type::get();
        return view('admin.table-manager.cate',['types' => $types]);
    }

    public function getEdit($id_t){
        $type = Type::find($id_t);
        return view('admin.table-add.cate', ['type' => $type]); 
    }
    public function postEdit($id_t, Request $request){
        $type = Type::find($id_t);
        $this->validate($request, [
            'name_cate' => 'required|unique:type,name_t,'. $type->id,
            'des_cate' => 'required'
        ]);
        $type->name_t = $request->name_cate;
        $type->description = $request->des_cate;
        $type->updated_at = new DateTime();
        $type->save();
        return redirect()->route('list-category');
    }
}
