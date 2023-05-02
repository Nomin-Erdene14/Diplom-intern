<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Company;
use App\Models\Job;
use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use App\Models\job_user;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;

use Pdf;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['admin', 'verified'], ['except' => array('index', 'create','store','destroy','edit','update','updateALLExceptImage','trash'
        ,'restore','foreverdelete','toggle','allposts','seepost','report','reportpdf','users','usersCreate','usersStore')]);
    }
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('admin.index',compact('posts'));
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
       //return $request->all();
       $this->validate($request,[
        'title'=>'required|min:3',
        'content'=>'required',
        'image'=>'required|mimes:png,jpg,jpeg'
       ]);
       if($request->hasFile('image')){
        $file=$request->file('image');
        $path = $file->store('upload','public');
        Post::create([
            'title'=>$request->title,
            'slug'=> Str::slug($request->title),
            'content'=>$request->content,
            'image'=> $path,
            'status'=>$request->status
        ]);
       }
       return redirect('/dashboard')->with('message','Ажилттай нийтэллээ');
    }
    public function destroy(Request $request)
    { 
      $post=Post::find($request->id);
      if($post){
        $post->delete();
      return redirect()->back()->with('message','Ажилттай устгалаа');
      }
      return redirect()->back()->with('messageError','Амжилтгүй');
       
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit',compact('post','id'));
    }
    public function update($id, Request $request)
    {
      //dd($id,$request->all());
      $this->validate($request,[
        'title'=>'required|min:3',
        'content'=>'required',
       ]);
       if($request->hasFile('image')){
        $file=$request->file('image');
        $path = $file->store('upload','public');
        Post::where('id',$id)->update([
            'title'=>$request->title,
            'slug'=> Str::slug($request->title),
            'content'=>$request->content,
            'image'=> $path,
            'status'=>$request->status
            
        ]);
       }
       $this->updateALLExceptImage($request,$id);
       return redirect('/dashboard')->with('message','Ажилттай шинэчлэлээ');
    }
    public function updateALLExceptImage(Request $request, $id)
    {
        return Post::where('id',$id)->update([
            'title'=>$request->title,
            'slug'=> Str::slug($request->title),
            'content'=>$request->content,
            'status'=>$request->status
            
        ]);
    }
    public function trash()
    {
        $posts= Post::onlyTrashed()->latest()->paginate(5);
        return view('admin.trash',compact('posts'));
    }
    public function restore($id)
    {
        Post::onlyTrashed()->where('id',$id)->restore();
        return redirect()->back()->with('message','Ажилттай сэргээлээ');
    }
    public function foreverdelete($id)
    {
        Post::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect()->back()->with('message','Ажилттай устлаа');
    }
    public function toggle($id)
    {
        $post = Post::find($id);
        $post->status = !$post->status;
        $post->save();
        return redirect()->back()->with('message','Ажилттай статус шинэчиллээ');
    }
    public function allposts()
    {
        $posts= Post::latest()->take(6)->where('status',1)->get();
        Paginator::defaultView('view-name');
        //dd($posts);
        // $posts= Post::latest()->limit(3)->where('status',1)->get();
          return view('admin.allposts', compact('posts'));
    }
    public function seepost($id, Post $post)
    {
        $posts = Post::findOrFail($id);
        
        return view('admin.seepost', compact('posts'));
    }
    public function report(Request $request){
       
        // $pdf = PDF::loadView('admin.report', ['data'=>$data]);
        // return $pdf->download('admin.report.pdf');
       $fromdate = $request->fromdate;
       $todate= $request->todate;
      if($fromdate && $todate) {
         $datas=\DB::select("SELECT*FROM users WHERE created_at BETWEEN '$fromdate 00:00:00' AND'$todate 23:59:59'");
          return view('admin.report',compact('datas'));
      }
     else
     $name=$request->name;
     $user_type=$request->user_type;
     $email=$request->email;
     $created_at=$request->created_at;
     $updated_at=$request->updated_at;
     

         if($name|| $user_type ||$email||$updated_at){
            $datas = User::where('id', 'LIKE', '%' . $name . '%')
                ->orWhere('user_type', $name)
                ->orWhere('name', $name)
                ->orWhere('email', $name)
                ->orWhere('created_at', $name)
                ->orWhere('updated_at', $name)
                ->latest()->paginate();
           
              return view('admin.report',compact('datas'));
        }
        
         else {
            $datas = User::all();
          
            return view('admin.report', compact('datas'));
        }
       
    }
    public function tehnologyreport(){
        // $ordered = Job::select('category_id')
        // ->selectRaw('count(category_id) as qty')
        // ->groupBy('category_id')
        // ->orderBy('qty', 'DESC')
        // ->get();
        //dd($ordered);
        $ordered = Job::select('tehnology')
        ->selectRaw('count(tehnology) as qty')
        ->groupBy('tehnology')
        ->orderBy('qty', 'DESC')
        ->get();
        // dd($teh);
        return view('admin.reportTehnology', compact('ordered'));
    }
    public function tehnologysee(Request $request){
        $fromdate = $request->fromdate;
        $todate= $request->todate;
       if($fromdate && $todate) {
          $tehs=\DB::select("SELECT*FROM jobs WHERE created_at BETWEEN '$fromdate 00:00:00' AND'$todate 23:59:59'");
           return view('admin.tehnologysee',compact('tehs'));
           dd($tehs);
       }
      //frontpage search
      $haih = $request->haih;
      if($haih){
          $tehs = Job::where('title', 'LIKE', '%' . $haih . '%')
              ->orWhere('position', $haih)
              ->orWhere('type', $haih)
              ->orWhere('description', $haih)
              ->orWhere('role', $haih)
              ->orWhere('tehnology', $haih)
              ->orWhere('address', $haih)
              ->orWhere('status', $haih)
              ->orWhere('salary', $haih)
              ->orWhere('time', $haih)
              ->orWhere('last_date', $haih)
              ->orWhere('created_at', $haih)
              ->latest()->paginate(10);
          //dd($jobs['data'][0]);
          //dd($tehs);
          
          return view('admin.tehnologysee', compact('tehs'));
      }
         
          else {
             $tehs = Job::all();
             //return redirect()->back()->with('message','oldsongu');
            return view('admin.tehnologysee', compact('tehs'));
         }
        
    }
    public function reportpdf()
    {
    //     // suuliin 3 odriin report
    //      $data=User::where('created_at','>=',Carbon::now()->subdays(3))->get(['name','created_at']);
    //     // suuliin 7 honogiin report
    //     $previous_week = strtotime("-1 week +1 day");
    //     $start_week = strtotime("last sunday midnight",$previous_week);
    //     $end_week = strtotime("next saturday",$start_week);
    //     $start_week = date("Y-m-d",$start_week);
    //     $end_week = date("Y-m-d",$end_week);
    //     $data=User::whereBetween('created_at', [$start_week, $end_week])->get(['name','created_at']);
    //     //suuliin 1 sariin burtguulsn hereglegchid
    //     $data=User::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get(['name','created_at']);
        
    //     //suuliin sard butgegdsn zar
    //     $data=Job::whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get(['title','created_at']);
    //     //suuliin 15 honogiin useriin tailan
    //     $data=$last_15_days = User::where('created_at','>=',Carbon::now()->subdays(15))->get(['name','created_at']);
        
    //     //suuliin 30 honogiin useriin tailan
    //     $data=$last_30_days = User::where('created_at','>=',Carbon::now()->subdays(30))->get(['name','created_at']);
    //     //suuliin jiliin
    //     $data=User::whereYear('created_at', date('Y', strtotime('-1 year')))->get(['name','created_at']);
       
    //     //ongorsn jiliin datag saraar n
    //     $data=User::select(\DB::raw("(COUNT(*)) as count"),\DB::raw("MONTHNAME(created_at) as monthname"))
    //     ->whereYear('created_at', date('Y', strtotime('-1 year')))
    //     ->groupBy('monthname')
    //     ->get(); 
    //     // orderby
    //     $users = \DB::table('users')
    //             ->orderBy('name', 'desc')
    //             ->get();
    //     //ereltte category
    //     $ordered = Job::select('category_id')
    //     ->selectRaw('count(category_id) as qty')
    //     ->groupBy('category_id')
    //     ->orderBy('qty', 'DESC')
    //     ->get();
    //     //olon zar oruulsn company
    //     $ordered = Job::select('company_id')
    //     ->selectRaw('count(company_id) as qty')
    //     ->groupBy('company_id')
    //     ->orderBy('qty', 'DESC')
    //     ->get();
    //     //ereltte tehnology
    //     $tehs = Job::select('tehnology')
    //     ->selectRaw('count(tehnology) as qty')
    //     ->groupBy('tehnology')
    //     ->orderBy('qty', 'DESC')
    //     ->get();
    //    //surguuliar tailan gargh
    //     $tehs = Profile::select('school')
    //     ->selectRaw('count(school) as qty')
    //     ->groupBy('school')
    //     ->orderBy('qty', 'DESC')
    //     ->get();

    //     dd($tehs);
       
        
      
        $datas= User::all();
        $pdf = PDF::loadView('admin.report', ['datas'=>$datas]);
        return $pdf->download('admin.report.pdf');
    }
    public function users(){
        $users= User::latest()->paginate(5);
        
        $userCount= User::all()->count();
        Paginator::useBootstrap();
        return view('admin.user.view',compact('users','userCount'));
    }
    public function usersCreate(){
       
        return view('admin.user.create');
    }
    public function usersStore(Request $request){
        $user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=> $request->user_type,
            
        ]);
        
         Profile::create([
            'user_id'=> $user->id,
           
            
        ]);
       
        
        return redirect('/dashboard/view')->with('message','Амжилттай бүртэглээ');
    }
    public function usersEmployer(){
        return view('admin.employer.create');
    }
    public function employerStore(Request $request){
        $user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=> $request->user_type,
            
        ]);
        Company::create([
               'user_id' => $user->id,
               'cname' => $request->name,
               'slug' => $request->name,
              
            ]);
            return redirect('/dashboard/view')->with('message','Амжилттай бүртэглээ');
    }
    public function adminCreate(){
       
        return view('admin.admin.create');
    }
    public function adminStore(Request $request){
        $user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type'=> $request->user_type,
            
        ]);
        Role::create([
               'user_id' => $user->id,
               'name' => $request->name,
            ]);
            //dd($user);
            return redirect('/dashboard/view')->with('message','Амжилттай бүртэглээ');
    }
    public function adminEdit( $id)
    {
         
        $user = User::findOrFail($id);
      
        return view('admin.user.edit',compact('user'));
    }
    public function adminUpdate(Request $request,$id){
        $user = User::FindOrFail($id)->update([
        'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
         
            
        ]);
        if($user->user_type === 'employer'){
        Company::create([
          
            'cname' => $user->name
        ]);
    } return redirect('/dashboard/view')->with('message','Амжилттай шинэчиллээ');
    }
    public function adminDelete( $id)
    {
       
        $user = User::findOrFail($id);
        $user->delete();
        $user->roles()->delete();
        $user->profile()->delete();
        $user->company()->delete();
        $user->job()->delete();
      
        return redirect('/dashboard/view')->with('message','Амжилттай Устлаа');
    }
}
