<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Users extends Model
{
    public static function get_deactivated_request() {

        return DB::table('users')
                     ->select('id','first_name','last_name','email','phone')
                     ->where('status', 0)
                     ->get();
    }

    public static function active_users($id) {
          DB::table('users')
                ->where('id', $id)
                ->update(['status' => 1]);
    }

    public static function get_all_active_users() {
        return DB::table('users')
        ->select('id','first_name','last_name','email','phone','is_super')
        ->where('status',1)
        ->get();
    }

    public static function change_super($id, $field) {
        DB::table('users')
              ->where('id', $id)
              ->update(['is_super' => $field]);
  }

  public static function add_meal($lunch, $dinner) {

    DB::table('meals')->insert([
        [
        'user_id' => Auth::user()->id, 
        'lunch' => $lunch,
        'dinner' => $dinner,
        'date' => Date('Y-m-d'),
        'time' => time()
        ]
    ]);
  }

  public static function get_individual_meal_record() {
    
    $date = Date('Y-m-d');

    return DB::table('meals')
                ->select('date')
                ->where('user_id', Auth::user()->id)
                ->where('date', $date)
                ->get()->first();

  }

  public static function get_my_current_month_meals() {
    
    $id = Auth::user()->id;
    
    return DB::select( DB::raw("SELECT *
    FROM meals
    WHERE MONTH(date) = MONTH(CURRENT_DATE())
    AND YEAR(date) = YEAR(CURRENT_DATE()) AND user_id = '$id'") );
  }

}