<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class FavouriteController extends Controller
{
    public function savejob($id){
        $jobId = Job::findOrFail($id);
        $jobId->favourite()->attach(auth()->user()->id);
        return redirect()->back()->with('Messagesave','Амжилттай хадгаллаа');
      }
      public function unsavejob($id){
          $jobId = Job::findOrFail($id);
          $jobId->favourite()->detach(auth()->user()->id);
        return  redirect()->back();
      }
}
