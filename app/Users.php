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

  public static function get_public_meals($id) {
    
    return DB::select( DB::raw("SELECT meals.*,users.first_name,users.last_name
    FROM meals
    INNER JOIN users ON users.id=meals.user_id
    WHERE MONTH(meals.date) = MONTH(CURRENT_DATE())
    AND YEAR(meals.date) = YEAR(CURRENT_DATE()) AND user_id = '$id'") );
  }

  public static function edit_meal($id, $lunch, $dinner) {
    DB::table('meals')
          ->where('id', $id)
          ->update(['lunch' => $lunch, 'dinner' => $dinner]);
}

public static function save_money($user_id, $month, $year, $value) {

  DB::table('money')->insert([
    [
    'user_id' => $user_id, 
    'month' => $month,
    'year' => $year,
    'value' => $value,
    'time' => time()
    ]
]);
}

public static function get_current_month_money() {
  
  $id = Auth::user()->id;
  $month = date("F");
  $year = date("Y");
    
  return DB::table('money')
            ->select('money.*')
            ->where('month', $month)
            ->where('year', $year)
            ->where('user_id', $id)
            ->sum('money.value');
}

public static function get_current_month_meal() {
  
  $id = Auth::user()->id;
    
  return DB::select( DB::raw("SELECT SUM(lunch)+SUM(dinner) AS total
  FROM meals
  WHERE MONTH(date) = MONTH(CURRENT_DATE())
  AND YEAR(date) = YEAR(CURRENT_DATE()) AND user_id = '$id'") );

 }

 public static function get_money_by_month($month, $year) {
  
  $id = Auth::user()->id;

  return DB::table('money')
            ->select('money.*')
            ->where('month', $month)
            ->where('year', $year)
            ->where('user_id', $id)
            ->sum('money.value');

 }

 public static function get_meal_by_month($month, $year) {
  
  $id = Auth::user()->id;
    
  // return DB::select( DB::raw("SELECT SUM(lunch)+SUM(dinner) AS total
  // FROM meals
  // WHERE MONTH(date) = '$month'
  // AND YEAR(date) = '$year' AND user_id = '$id'") );

  return DB::table('meals')
            ->select('meals.*')
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('user_id', $id)
            ->sum(DB::raw('lunch + dinner'));

 }

 public static function background_value() {
    
  return DB::table('background')->select('status')->where('user_id',Auth::id())->get()->first();

 }

}