<?php

namespace App\Http\Controllers;

use App\Models\company;
use App\Models\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function __construct(){
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'company')]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, Company $company)
    {
        $company = Company::FindOrFail($id);
        return view('company.index', compact('company'));
        
    }

    
    public function coverphoto(Request $request)
    {
        $this->validate($request,[
            'cover_photo'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20000|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
            
         ]);
        $user_id= auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file= $request->file('cover_photo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/coverphoto',$filename);
            Company::where('user_id',$user_id)->update([
                'cover_photo'=>$filename
            ]);
        }
        return redirect()->back()->with('MessageCoverPhoto', 'Дадлага зарлагчийн ковер зураг шинэчлэгдлээ');
    }
    public function logo(Request $request)
    {
        $this->validate($request,[
            'logo'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:20000'
            
         ]);
        $user_id= auth()->user()->id;
        if($request->hasFile('logo')){
            $file= $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('upload/logo',$filename);
            Company::where('user_id',$user_id)->update([
                'logo'=>$filename
            ]);
        }
        return redirect()->back()->with('MessageLogo', 'Дадлага зарлагчийн нүүр зураг шинэчлэгдлээ');
    }
    public function company()
    {
        $companies= Company::latest()->paginate(8)->all();
        return view('company.company', compact('companies'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
        
            'address'=> 'required',
            'phone'=> 'required|numeric',
            'website'=> 'required',
            'slogan'=> 'required',
            'description'=> 'required',
         ]);
      $user_id = auth()->user()->id;
      Company::where('user_id',$user_id)->update([
        'cname'=>$request->cname,
        'slug' => Str::slug($request->cname),
        'address'=>$request->address,
        'phone'=>$request->phone,
        'website'=>$request->website,
         'slogan'=>$request->slogan,  
         'description'=>$request->description,
      ]);
      User::where('id',$user_id)->update([
        'email'=>$request->email,
      ]);
      return  redirect()->back()->with('MessageCompany', 'Дадлага зарлагчийн мэдээллийг амжилттай шинэчиллээ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }
}
