<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publish;
use DateTime;
class PublishController extends Controller
{
    public function getPublish(){
        return view('admin.table-add.publish');
    }
    public function postPublish(Request $request){
        $this->validate($request,[
            'name_publish' => 'required|unique:publish,name_pub',
            'des_publish' => 'required',
            'email_pub'=> 'required',
            'add_pub' => 'required',
            'phone_pub' => 'required',
        ]);
        $publish = new Publish();
        $publish->name_pub = $request->name_publish;
        $publish->description_pub = $request->des_publish;
        $publish->email_pub = $request->email_pub;
        $publish->add_pub = $request->add_pub;
        $publish->phone_pub  = $request->phone_pub;
        $publish->created_at = new DateTime();
        $publish->save();
        return redirect()->route('list-publish');
    }
    public function getDele($id_pub){
        $publish = Publish::find($id_pub);
        $publish->delete();
        return redirect()->route('list-publish');
    }
    public function getList(){
        $publishes = Publish::get();
        return view('admin.table-manager.publish',['publishes' => $publishes]);
    }

    public function getEdit($id_pub){
        $publish = Publish::find($id_pub);
        return view('admin.table-add.publish', ['publish' => $publish]); 
    }
    public function postEdit($id_pub, Request $request){
        $pub = Publish::find($id_pub);
        $this->validate($request, [
            'name_publish' => 'required|unique:publish,name_pub,'. $pub->id,
            'des_publish' => 'required'
        ]);
        $pub->name_pub = $request->name_publish;
        $pub->description_pub = $request->des_publish;
        $pub->updated_at = new DateTime();
        $pub->save();
        return redirect()->route('list-publish');
    
    }
}
