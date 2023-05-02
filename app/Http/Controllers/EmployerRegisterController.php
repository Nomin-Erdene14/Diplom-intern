<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class EmployerRegisterController extends Controller
{
    
    public function store(Request $request){
        // return $request->email;
        $user = User::create([
            'name' => $request->cname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type
        ]);
        //return $user;

        Company::create([
            'user_id' => $user->id,
            'cname' => $request->cname,
            'email' => $request->email,
            'slug' => Str::slug($request->cname)
        ]);
        $user->sendEmailVerificationNotification();
        return redirect()->to('login')->with('Message', 'Та майл хаягаа шалгана уу? Таны бүртгүүлсэн хаягруу баталгаажуулах линк явуулсан байгаа.');
    }
    protected function redirectTo()
{
    return '/login';
}
}
