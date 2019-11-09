<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Users;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Users::get_all_current_month_meals();
        $total = Users::get_sum_current_month_meals();
        $money = Users::get_current_month_all_money();
        $total_money = Users::get_current_month_sum_money();
        // var_dump($total_money);
        // die();
        return view('home', compact('data','total','money','total_money'));
    }
}
