<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
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

    public function get_public_meal($id) {

        $meals = Users::get_public_meals($id);
        return view('public_meal', compact('meals'));
    }

    public function edit_meal(Request $request) {

        $id = $request->input('id');
        $lunch = $request->input('lunch');
        $dinner = $request->input('dinner');

        Users::edit_meal($id, $lunch, $dinner);
        return redirect()->back();

    }

    public function add_money() {

        $user = Users::get_all_active_users();
        return view('add_money', compact('user'));
    }

    public function save_money(Request $request) {

        $user_id = $request->input('user_id');
        $month = $request->input('month');
        $year = $request->input('year');
        $value = $request->input('value');

        $this->validate($request, [
            'user_id' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
            'value' => ['required', 'numeric']

         ]);
        
        Users::save_money($user_id, $month, $year, $value);
        return redirect()->back()->with('message', 'Money Added Succesfully');
    }

    public function my_history() {

        $curr_money = Users::get_current_month_money();
        $curr_meal = Users::get_current_month_meal();
        $field = Users::background_value();
        $total_meal = 0;
       foreach($curr_meal as $row){
           $total_meal =  $row->total;
       }
       //var_dump($curr_meal);
       //die();

        return view('my_history', compact('curr_money','total_meal','field'));
    }

    public function get_money_by_month(Request $request) {

        $month = $request->input('month');
        $year = $request->input('year');

        $this->validate($request, [
            'month' => ['required'],
            'year' => ['required']
         ]);

        $data = Users::get_money_by_month($month, $year);
        echo $data;
    }

    public function get_meal_by_month(Request $request) {

        $mmonth = $request->input('mmonth');
        $myear = $request->input('myear');
     
        $this->validate($request, [
            'mmonth' => ['required'],
            'myear' => ['required']
         ]);

        $mealData = Users::get_meal_by_month($mmonth, $myear);
        echo $mealData;
        
    }

    public function bacground_change() {

         $field = Users::background_value();
        
        if($field->status == null){
            DB::table('background')->insert([
                [
                'user_id' => Auth::id(), 
                'status' => 'b'
                ]
            ]);
        }
        elseif($field->status == 'b') {
            DB::table('background')
            ->where('user_id', Auth::id())
            ->update(['status' => 'w']);
        }
        else{
            DB::table('background')
            ->where('user_id', Auth::id())
            ->update(['status' => 'b']);
        }

    }

    public function get_all_current_month_meals() {

        
    }
}
