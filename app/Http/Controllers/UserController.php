<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    function uploadAvatar(Request $request){
        if($request->hasFile("image")){
            User::uploadAvatar($request->image);
            //$request->session()->flash("message",'Image Uploaded...');
            return redirect()->back()->with("message",'Image Uploaded...');
            }
        //$request->session()->flash("error",'Error Image  Uploaded...');
        return redirect()->back()->with("error",'Error Image  Uploaded...');
    }




    public function index(){
        $data=["name"=>"tengo2","email"=>"tengo2@gmail.com","password"=>"123"];

       // User::create($data);
        //DB::insert("insert into users(name,email,password)values(?,?,?)",["tengo","tengo@gmail.com","123"]);
        //DB::update('update users set name = ? where id = 1', ['tengo']);
        //DB::delete('delete from users  where id = 1');
       // $users = DB::select('select * from users');
        //return $users;


//        $user = new User();
//
//         $user->name="tengo";
//        $user->email="tengo@gmail.com";
//        $user->password=bcrypt("123");
//         $user->save();

        $user = User::all();
        return $user;
        //dd($user);
        //User::delete()->where("id",3);

        //User::where('id',3)->delete();
       // User::where('id',4)->update(['name'=>"tengo2"]);
        return "WORKS";
    }
}
