<?php

namespace App\Http\Controllers;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Sendjob;

class EmailController extends Controller
{
    public function email(Request $request){
        //return $request->all();
        
        $homeUrl = url('/');
        $jobId = $request->job_id;
        $jobSlug = $request->job_slug;
        // return $jobId;
        $jobUrl = $homeUrl . '/' . $jobId . '/jobs/' .'?'. $jobSlug;
   
    $data = array(
        'your_name' => $request->your_name,
        'your_email' => $request->your_email,
        'friend_email' => $request->friend_email,
        'jobUrl' => $jobUrl
    );

    $emailTo = $request->friend_email;
    try{
        Mail::to($emailTo)->send(new Sendjob($data));
        return redirect()->back()->with('message', 'И-Мэйл илгээгдлээ.');
    }catch(\Exception $e){
        return redirect()->back()->with('error-message', 'И-Мэйл илгээж чадсангүй. Та дахин оролдоно уу?');
    }

}
}
