<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DateTime, DB;

class UserController extends Controller
{
    public function getAddUser(){
        return view('admin.table-add.user');
    }
    public function postAddUser(Request $request){
        $this->validate($request, [
            'first-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'username' => 'required|unique:user,username',
            'level' => 'required',
            'password' => 'required|min:5',
            'password_confirm' => 'required|same:password'
        ]);
        $user = new User();
        $user->name = $request['first-name'] . ' ' . $request['last-name'];
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->level = $request['level'];
        $user->created_at = new DateTime();
        $user->save();
        return redirect()->route('list-user');
    }
    public function getListUser(){
        $data = User::paginate(5);
        return view('admin.table-manager.user', ['data'=> $data]);
    }
    public function getDeleUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('list-user');
    }
    public function getEditUser($id){
        $user = User::find($id);
        return view('admin.table-add.user', ['user' => $user]);
    }
    public function postEditUser($id ,Request $request){
        $user = User::find($id);
        $this->validate($request, [
            'first-name' => 'required|max:255',
            'last-name' => 'required|max:255',
            'username' => 'required|unique:user,username,'.$user->id,
            'level' => 'required',
            'password' => 'required|min:5',
            'password_confirm' => 'required|same:password'
        ]);
        $user->name = $request['first-name'] . ' ' . $request['last-name'];
        $user->username = $request['username'];
        $user->password = bcrypt($request['password']);
        $user->level = $request['level'];
        $user->updated_at = new DateTime();
        $user->save();
        return redirect()->route('list-user');
    }


    public function search(Request $request){
        $search_key = $request->search;
        $search = DB::table('user')->where('username', 'LIKE', "%$search_key%")->paginate(5);
        $count = count($search);
        return view('admin.table-manager.user', ['data'=> $search, 'search' => $search_key, 'count' =>$count]);
    }

    public function sort(Request $request){
        echo "";
    }
}
