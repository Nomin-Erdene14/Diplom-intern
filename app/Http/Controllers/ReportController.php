<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Job;
use App\Models\Job_user;

class ReportController extends Controller
{
    public function index(){
        //niit ajilchdiin too
        $users = User::count();
        //niit burtgelte company too
        $companies = Company::count();
        //niit ajliin bairnii too
        $jobs = Job::count();
        
        // $totalUsers = User::count();
        // $totalJobs = Job::count();
        // // $productsByCategory = Job::groupBy('category_id')->selectRaw('category_id, count(*) as total')->get();
        //$productsByCategory = Job::groupBy('category_id')->get();
    //     $productsByCategory = Product::groupBy('category')
    // ->selectRaw('category, count(*) as total_products, avg(price) as avg_price')
    // ->get();
        //dd($users);
    
        // Niitlegdeegu ajiluud
         $count=Job::where('status','0')->count();
         // Niitlegdsn ajiluud
         $count1=Job::where('status','1')->count();
        dd($companies,$users,$jobs,$count,$count1);
        //return view('report',compact($users));
    }
}
