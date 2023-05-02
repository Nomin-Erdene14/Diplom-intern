<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class ChartJSController extends Controller
{
    public function index(){
        $user = User::where('user_type','simple_user')->get();
        $employer = User::where('user_type','employer')->get();
        $admin = User::where('user_type','admin')->get();
        $user_count = count($user);     
        $employer_count = count($employer);
        $admin_count = count($admin);
        return view('admin.chart',compact('user_count','employer_count','admin_count'));
    }
    
}
