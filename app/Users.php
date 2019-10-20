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
        ->select('id','first_name','last_name','email','phone')
        ->where('status',1)
        ->get();
    }
}