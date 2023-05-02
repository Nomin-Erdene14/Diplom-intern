<?php

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Category;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Http\Requests\JobPostRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;
use DB;
use Notification;
use App\Notifications\EmailNotificationphp;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'show', 'apply', 'alljobs', 'searchjob')]);
    }
    public function index()
    {
        $jobs = Job::latest()->limit(5)->where('status', 1)->get();
        $categories=Category::with('jobs')->get();
        $posts= Post::latest()->take(3)->where('status',1)->get();
        


        //return $categories; ->sortByDesc('jobs_counts')->take(3)
        foreach($categories as $category){
            //  echo $category->name;
            //  echo $category->jobs->count();

        }
        $companies =Company::latest()->limit(5)->get();
        return view('welcome', compact('jobs','companies','categories','posts'));
    }
   
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
         'tehnology'=> 'required|in:java,laravel,C++,ruby,Bootstrap,PHP,phython,Other'
         ]);
        $user_id = Auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id'=>$user_id,
            'company_id'=>$company_id,
            'category_id' => $request->category,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'description'=>$request->description,
            'salary'=>$request->salary,
            'time'=>$request->time,
            'type'=>$request->type,
            'role'=>$request->role,
            'tehnology'=>$request->tehnology,
            'position'=>$request->position,
            'address'=>$request->address,
            'type'=>$request->type,
            'status'=>$request->status,
            'last_date'=>$request->last_date,

        ]);

        return  redirect()->back()->with('MessageJob', 'Дадлагын зар амжилттай бүртгэгдлээ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id, Job $job )
    { 

        $job = Job::findOrFail($id);
        //dd($job->position);
        $data=[];
        $jobBasedOnCategories = Job::latest()
        ->where('category_id',$job->category_id)
        ->whereDate('last_date', '>', date('Y-m-d'))
        ->where('id','!=', $job->id)
        ->where('status',1)
        ->limit(4)
        ->get();
        //dd($jobBasedOnCategories);
        array_push($data,$jobBasedOnCategories);
        //dd($jobBasedOnCategories);
        $jobBasedOnCompany = Job::latest()
            ->where('company_id',$job->company_id)
            ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id','!=', $job->id)
            ->where('status',1)
            ->limit(4)
            ->get();
        //dd($jobBasedOnCompany);
        array_push($data,$jobBasedOnCompany);
        $jobBasedOnPosition = Job::latest()
            ->where('position','LIKE','%' . $job->position . '%') ->whereDate('last_date', '>', date('Y-m-d'))
            ->where('id','!=', $job->id)
            ->where('status',1)
            ->limit(4)
            ->get();
        //
        array_push($data,$jobBasedOnPosition);

        $collection = collect($data);
        $unique =$collection->unique("id");
        $jobRecomandations=$unique->values()->first();
        // $unique ->values()->first();
        //dd($unique);
        return view('jobs.show', compact('job','id','jobRecomandations'));
         
           
    }


    public function myjob()
    {
        $jobs = Job::latest()->limit(5)->where('user_id', auth()->user()->id)->get();
        //return $jobs;
        return view('jobs.showjobs', compact('jobs'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function allintern()
    {
        if(Auth::user()->user_type === 'employer') { 
            //$interns = User::where('user_type')->get();
            $interns = Job::has('users')->where('user_id')->get();
            return view('jobs.allintern', compact('interns'));
        } else {
           
        }
    }
    public function edit($id, Job $job)
    
    {
        $job= Job::findOrFail($id);
        return view ('jobs.edit',compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
         $job= Job::findOrFail($id);
        // dd($job);
        //  $job->update($request->all());
        $job->update([
            $job->title = $request->title,
            $job->slug = Str::slug($request->title),
            $job->description = $request->description,
            $job->role = $request->role,
            $job->tehnology=$request->tehnology,
            $job->position = $request->position,
            $job->address = $request->address,
            $job->salary = $request->salary,
            $job->time = $request->time,
            $job->type = $request->type,
            $job->status = $request->status,
            $job->last_date = $request->last_date,
        ]);
        //dd($job);
        //return  redirect('/jobs/myjob')->with('message', 'Мэдээлэл амжилттай шинэчлэгдлээ');
        return view ('jobs.amjilttai',compact('job'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
      
        return redirect('/jobs/myjob')->with('message','Амжилттай Устлаа');
    }
    public function alljobs(Request $request)
    {
        $tehnology = $request->tehnology;
        if($tehnology){
            $jobs = Job::where('tehnology', 'LIKE', '%' . $tehnology . '%')
            ->latest()->paginate(5);
            
            $categories = Category::all();
            return view('jobs.alljobs', compact('jobs', 'categories'));
        }
        $type = $request->type;
        if($type){
            $jobs = Job::where('type', 'LIKE', '%' . $type . '%')
            ->latest()->paginate(5);
            
            $categories = Category::all();
            return view('jobs.alljobs', compact('jobs', 'categories'));
        }
        $category = $request->category_id;
        if($category){
            $jobs = Job::where('category_id', 'LIKE', '%' . $category . '%')
            ->latest()->paginate(5);
            
            $categories = Category::all();
            return view('jobs.alljobs', compact('jobs', 'categories'));
        }
        //frontpage search
        $search = $request->search;
        if($search){
            $jobs = Job::where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('position', $search)
                ->orWhere('type', $search)
                ->orWhere('tehnology', $search)
                ->orWhere('address', $search)
                ->orWhere('last_date', $search)
                ->latest()->paginate(10);
            //dd($jobs['data'][0]);
            //dd($jobs);
            $categories = Category::all();
            return view('jobs.alljobs', compact('jobs', 'categories'));
        }
        else {
                $jobs = Job::latest()->paginate(8);
                $categories = Category::all();
                return view('jobs.alljobs', compact('jobs', 'categories'));
            } 
     
            $categories = Category::all();
            return view('jobs.alljobs', compact('jobs', 'categories'));
        
        

    }
        public function apply(Request $request, $id)
        {
            $jobId = Job::findOrFail($id);
            $jobId->users()->attach(Auth::user()->id);
            return redirect()->back()->with('MessageApply','CV илтгээгдлээ');
        }
        public function applicant(Request $request)
        {
           // return Job::has('user')->get();
          $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
          
           return view('jobs.applicants',compact('applicants'));
        }
        public function applicantsee($id)
        {
         $profile = Profile::all();
         $user_id = User::find($id);
     
          $totalPoints = DB::table('results')
                ->where('user_id', '=', $user_id->id)
               ->select('total_points')
             ->latest()->first();
            //dd($totalPoints );          
       
           return view('company.applicantsee',compact('user_id','profile','totalPoints'));
        }
      
    
}
