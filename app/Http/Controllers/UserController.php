<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\File;
use App\Models\Profile;
use App\Models\Result;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Validation\Validator;
class UserController extends Controller
{
    public function index()
    { 
       $users = User::where('id',auth()->user()->id)->get();
    //    $profile = Profile::where('id',auth()->user()->id)->get();
       
        return view('profile.index',compact('users'));
    }
    public function update (Request $request)
    {
        $this->validate($request,[
        
           'address'=> 'required',
           'phone_number'=> 'required|numeric',
           'experience'=> 'required',
           'bio'=> 'required',
           
        ]);
        $user_id=auth()->user()->id;
        //return $user_id;
        Profile::where('user_id',$user_id)->update([
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'phone_number'=>$request->phone_number,
            'bio'=>$request->bio,
            'address'=>$request->address,
            'school'=>$request->school,
            'GPA'=>$request->GPA,
            'experience'=> $request->experience,
            'bio'=>$request->bio,
        ]);
        User::where('id',$user_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->back()->with('Message','Амжилттай');
    }
    public function coverletter(Request $request){
        $this->validate($request,[
            'cover_letter'=> 'required|mimes:pdf,docs|max:10000',
        
         ]);
        $user_id=auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');

        Profile::where('user_id',$user_id)->update([
            'cover_letter'=>$cover,
            
        ]);
        return redirect()->back()->with('MessageCover','Сургуулийн тодорхойлолт амжилттай шинэчлэгдлээ');
    }
    public function resume(Request $request){
        $this->validate($request,[
            'resume'=> 'required|mimes:pdf,docs|max:10000',
        
         ]);
        $user_id=auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');

        Profile::where('user_id',$user_id)->update([
            'resume'=>$resume,
            
        ]);
        return redirect()->back()->with('MessageResume','Дүнгийн тодорхойлолт амжилттай шинэчлэгдлээ');
    }
    
    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            
         ]);
        $user_id=auth()->user()->id;
        if($request->hasFile('avatar')){
            $file=$request->file('avatar');
            $ext=$file->getClientOriginalExtension();
            $filename= time() . '.' . $ext;
            $file->move('upload/avatar/',$filename);
        }
        
        Profile::where('user_id',$user_id)->update([
            'avatar'=>$filename,
            
        ]);
        return redirect()->back()->with('MessageAvatar','Профайл  амжилттай шинэчлэгдлээ');
    }
    public function see(){
        $profile = Profile::all();
        
    $user_id = Auth::id();
    $totalPoints = DB::table('results')
                ->select('total_points')
                ->where('user_id', '=', $user_id)
                ->first();
    
        return view('profile.see',compact('profile','totalPoints'));

    }

}
