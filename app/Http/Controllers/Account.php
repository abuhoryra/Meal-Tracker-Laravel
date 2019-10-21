<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Users;


class Account extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // if(check_super_route()){
        //     return true;
        // }
    }

    public function get_deactived_users() {

        $data = check_super_route();
       if($data ) {

        $users = Users::get_deactivated_request();
        return view('deactive', compact('users'));

       }

       return response('<h1 style="color: red; text-align:center;">Sorry! No Access for You :)</h1>');
    }

    public function active_users($id) {

         Users::active_users($id);
         return redirect()->back();   
        
    }

    public function get_all_active_users() {

        $data = check_super_route();
       if($data ) {
        $users = Users::get_all_active_users();
        return view('all_users', compact('users'));
       }
       return response('<h1 style="color: red; text-align:center;">Sorry! No Access for You :)</h1>');
      

    }

    public function change_super($id, $field) {

        

        Users::change_super($id, $field);
        return redirect()->back();
    }
}
