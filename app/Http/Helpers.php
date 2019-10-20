<?php


 if(! function_exists('count_deactive_users')) {
     function count_deactive_users() {
        $data = DB::table('users')
                         ->select(DB::raw('count(*) as total'))
                         ->where('status', 0)
                         ->groupBy('status')
                         ->get()->first();
        echo $data->total;
     }
 }
