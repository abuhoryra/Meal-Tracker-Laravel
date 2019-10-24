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

    public function meal() {
        
        $meal = Users::get_individual_meal_record();
        return view('add_meal', compact('meal'));
    }

    public function save_meal(Request $request) {

        $lunch = $request->input('lunch');
        $dinner = $request->input('dinner');

        Users::add_meal($lunch, $dinner);
        return redirect()->back();

    }

    public function my_current_month_meal() {

        $meals = Users::get_my_current_month_meals();
        return view('my_meal', compact('meals'));
    }
}
