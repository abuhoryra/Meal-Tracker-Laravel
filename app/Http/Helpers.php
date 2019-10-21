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

 if(! function_exists('check_super')) {
    function check_super_route() {
      
        //$user = Auth::user();
        $id = Auth::id();
      

       $data = DB::table('users')
                    ->select('*')
                    ->where('id', $id)
                    
                    ->get()->first();
       $a = $data->is_super;
       if($a == 1){
           return true;
       }
       return false;
    }
}

if(! function_exists('check_super')) {
    function check_super() {
       $data = DB::table('users')
                    ->select('*')
                    ->where('id', Auth::user()->id)
                    ->get()->first();
       
                    if($data->is_super == 1) {
                        return true;
                    }
                    else{
                        return false;
                    }
    }
}