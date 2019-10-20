<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Users;

class Account extends Controller
{
    public function get_deactived_users() {

        $users = Users::get_deactivated_request();
        return view('deactive', compact('users'));
    }

    public function active_users($id) {

         Users::active_users($id);
         return redirect()->back();   
        
    }

    public function get_all_active_users() {

        $users = Users::get_all_active_users();
        return view('all_users', compact('users'));

    }
}
