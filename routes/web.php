<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ResultsController;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//job   

// Route::get('/jobs/{id}/{job}',[App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
Route::get('{id}/jobs', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');

// Route::get(
//     '/jobs/{id}/{job}',
//     [UserProfileController::class, 'show']
// )->name('jobs.show');

Route::get('/report',[App\Http\Controllers\ReportController::class,'index']);
Route::get('/', [App\Http\Controllers\JobController::class,'index'])->name('admin.home');
Route::get('/jobs/create', [App\Http\Controllers\JobController::class,'create'])->name('jobs.create');
Route::post('/jobs/create', [App\Http\Controllers\JobController::class,'store'])->name('jobs.store');

Route::get('/jobs/{id}/editmyjob/{job}',[App\Http\Controllers\JobController::class, 'edit'])->name('jobs.edit');
Route::post('/jobs/{id}/editmyjob/{job}', [App\Http\Controllers\JobController::class,'update'])->name('jobs.update');
Route::get('/jobs/myjob',[App\Http\Controllers\JobController::class, 'myjob'])->name('myjob');
Route::get('/jobs/intern',[App\Http\Controllers\JobController::class, 'allintern'])->name('allintern');
Route::any('/applications/{id}', [App\Http\Controllers\JobController::class,'apply'])->name('apply');

Route::get('/jobs/aplicantions', [App\Http\Controllers\JobController::class,'applicant'])->name('applicants');
Route::get('/jobs/see/{id}', [App\Http\Controllers\JobController::class,'applicantsee'])->name('applicantsee');
Route::get('/jobs/alljobs', [App\Http\Controllers\JobController::class,'alljobs'])->name('alljobs');
Route::get('/jobs/myjob/delete/{id}', [App\Http\Controllers\JobController::class,'destroy'])->name('destroy');



 //dadlga savelh
 Route::any('jobs/save/{id}',[App\Http\Controllers\FavouriteController::class,'savejob'])->name('savejob');
 Route::any('jobs/unsave/{id}',[App\Http\Controllers\FavouriteController::class,'unsavejob'])->name('unsavejob');
 
//company

Route::get('company/see/{id}', [App\Http\Controllers\CompanyController::class, 'index'])->name('company.index');
Route::get('company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('company.create');
Route::post('company/create', [App\Http\Controllers\CompanyController::class, 'update'])->name('company.update');
Route::post('company/coverphoto', [App\Http\Controllers\CompanyController::class, 'coverphoto'])->name('company.cover.photo');
Route::post('company/logo', [App\Http\Controllers\CompanyController::class, 'logo'])->name('company.logo');
Route::get('company/company', [App\Http\Controllers\CompanyController::class, 'company'])->name('company');




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user
Route::get('/user/profile', [App\Http\Controllers\UserController::class, 'index'])->name('user.profile');
Route::post('/user/profile/create', [App\Http\Controllers\UserController::class,'update'])->name('user.profile.update');
Route::post('/user/profile/coverletter', [App\Http\Controllers\UserController::class,'coverletter'])->name('user.profile.coverletter');
Route::post('/user/profile/resume', [App\Http\Controllers\UserController::class,'resume'])->name('user.profile.resume');
Route::post('/user/profile/avatar', [App\Http\Controllers\UserController::class,'avatar'])->name('user.profile.avatar');
Route::post('/user/register/update', [App\Http\Controllers\UserController::class,'RegisterUpdate'])->name('user.RegisterUpdate');
Route::get('/user/profile/see', [App\Http\Controllers\UserController::class,'see'])->name('user.see');

//dadlga zarlagch
Route::view('employer/register', 'auth.employer-register')->name('employer.create');
Route::post('employer/register', [App\Http\Controllers\EmployerRegisterController::class,'store'])->name('employer.register');

//category
Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class, 'jobindex'])->name('category.index');

Route::get('/Income', [App\Http\Controllers\IncomeController::class, 'index'])->name('income');

//mail
Route::post('/jobs/email', [App\Http\Controllers\EmailController::class, 'email'])->name('email');

//admin
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard')->middleware('admin');
Route::get('/dashboard/create', [App\Http\Controllers\DashboardController::class, 'create'])->name('post.create')->middleware('admin');
Route::post('/dashboard/create', [App\Http\Controllers\DashboardController::class, 'store'])->name('post.store')->middleware('admin');
Route::post('/dashboard/destroy', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('post.delete')->middleware('admin');
Route::any('/dashboard/{id}/edit', [App\Http\Controllers\DashboardController::class, 'edit'])->name('post.edit')->middleware('admin');
Route::any('/dashboard/{id}/update', [App\Http\Controllers\DashboardController::class, 'update'])->name('post.update')->middleware('admin');
Route::get('/dashboard/trash', [App\Http\Controllers\DashboardController::class, 'trash'])->name('post.trash')->middleware('admin');
Route::get('/dashboard/{id}/trash', [App\Http\Controllers\DashboardController::class, 'restore'])->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/trashedforever', [App\Http\Controllers\DashboardController::class, 'foreverdelete'])->name('post.foreverdelete')->middleware('admin');
Route::get('/dashboard/{id}/toggle', [App\Http\Controllers\DashboardController::class, 'toggle'])->name('post.toggle')->middleware('admin');
Route::get('/dashboard/posts', [App\Http\Controllers\DashboardController::class,'allposts'])->name('allposts');
//admin hereglegch udirdah
Route::get('/dashboard/view',[App\Http\Controllers\DashboardController::class,'users'])->name('admin.user.view')->middleware('admin');
Route::get('/dashboard/users/create/user',[App\Http\Controllers\DashboardController::class,'usersCreate'])->name('admin.user.create')->middleware('admin');
Route::post('/dashboard/users',[App\Http\Controllers\DashboardController::class,'usersStore'])->name('admin.user.store')->middleware('admin');
Route::get('/dashboard/users/create/employer',[App\Http\Controllers\DashboardController::class,'usersEmployer'])->name('admin.employer.create')->middleware('admin');
Route::post('/dashboard/employer',[App\Http\Controllers\DashboardController::class,'employerStore'])->name('admin.employer.store')->middleware('admin');
Route::get('/dashboard/users/create/admin',[App\Http\Controllers\DashboardController::class,'adminCreate'])->name('admin.admin.create')->middleware('admin');
Route::post('/dashboard/admin',[App\Http\Controllers\DashboardController::class,'adminStore'])->name('admin.admin.store')->middleware('admin');
Route::get('/dashboard/user/{id}/edit',[App\Http\Controllers\DashboardController::class,'adminEdit'])->name('admin.edit')->middleware('admin');
Route::post('/dashboard/{id}/users',[App\Http\Controllers\DashboardController::class,'adminUpdate'])->name('admin.update')->middleware('admin');
Route::get('/dashboard/users/{id}/delete',[App\Http\Controllers\DashboardController::class,'adminDelete'])->name('admin.delete')->middleware('admin');
Route::get('/dashboard/report/tehnology',[App\Http\Controllers\DashboardController::class,'tehnologyreport'])->name('report.tehnology')->middleware('admin');
Route::get('/dashboard/report/tehnology/see',[App\Http\Controllers\DashboardController::class,'tehnologysee'])->name('report.tehnology.see')->middleware('admin');

Route::get('/dashboard/{id}/posts', [App\Http\Controllers\DashboardController::class,'seepost'])->name('seepost');
//tailan
Route::any('/dashboard/report', [App\Http\Controllers\DashboardController::class,'report'])->name('report');
Route::any('/dashboard/report/pdf', [App\Http\Controllers\DashboardController::class,'reportpdf'])->name('reportpdf');
Auth::routes();

//exam
//Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('/test/dashboard', [App\Http\Controllers\HomeController::class,'index'])->name('client.home');
Route::get('/test', [App\Http\Controllers\TestController::class,'index'])->name('test');
Route::post('/test', [App\Http\Controllers\TestController::class,'store'])->name('test.store');
Route::get('/result/{result_id}', [App\Http\Controllers\ResultController::class,'show'])->name('results.show');
Route::get('/send/{result_id}', [App\Http\Controllers\ResultController::class,'send'])->name('results.send');


// Route::prefix('admin')->namespace('Admin')->middleware(['auth'])->group(function () {
    //Route::get('/', [App\Http\Controllers\HomeController::class,'index'])->name('admin.home');
//     // Permissions
  Route::middleware('auth')->group(function(){
   Route::get('permissions/destroy', [App\Http\Controllers\PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::get('permissions', [App\Http\Controllers\admin\PermissionsController::class, 'index']);

//     // Roles
    Route::get('roles/destroy', [App\Http\Controllers\RolesControlle::class, 'massDestroy'])->name('roles.massDestroy')->middleware('admin');
    Route::get('roles', [App\Http\Controllers\RolesControlle::class, 'index'])->middleware('admin');

    // Categories
    Route::get('admin/categories/destroy', [App\Http\Controllers\CategoryController::class, 'massDestroy'])->name('admin.categories.massDestroy')->middleware('admin');
    Route::get('admin/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories.index')->middleware('admin');
    Route::get('admin/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('admin.categories.create')->middleware('admin');
    Route::post('admin/categories/create', [App\Http\Controllers\CategoryController::class, 'store'])->name('admin.categories.store')->middleware('admin');
    Route::get('admin/categories/show/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('admin.categories.show')->middleware('admin');
    Route::get('admin/categories/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.categories.edit')->middleware('admin');
    Route::PUT('admin/categories/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('admin.categories.update')->middleware('admin');
    Route::get('admin/categories/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.categories.destroy')->middleware('admin');
    
//     // Questions
   Route::get('questions/destroy',[App\Http\Controllers\admin\QuestionsController::class, 'massDestroy'] )->name('questions.massDestroy');
    Route::get('questions', [App\Http\Controllers\admin\QuestionsController::class, 'index'] )->name('admin.questions.index');
    Route::get('questions/create', [App\Http\Controllers\admin\QuestionsController::class, 'create'] )->name('admin.questions.create');
    Route::post('questions/create', [App\Http\Controllers\admin\QuestionsController::class, 'store'] )->name('admin.questions.store');
    Route::get('questions/show/{id}', [App\Http\Controllers\admin\QuestionsController::class, 'show'] )->name('admin.questions.show');
    Route::get('questions/edit/{id}', [App\Http\Controllers\admin\QuestionsController::class, 'edit'] )->name('admin.questions.edit');
    Route::put('questions/update/{id}', [App\Http\Controllers\admin\QuestionsController::class, 'update'] )->name('admin.questions.update');
    Route::get('questions/delete/{id}', [App\Http\Controllers\admin\QuestionsController::class, 'destroy'] )->name('admin.questions.destroy');

  // Options
     Route::get('options/destroy', [App\Http\Controllers\admin\optionsController::class, 'massDestroy'])->name('options.massDestroy')->middleware('admin');
     Route::get('options', [App\Http\Controllers\admin\optionsController::class, 'index'])->name('admin.options.index')->middleware('admin');
     Route::get('options/create', [App\Http\Controllers\admin\optionsController::class, 'create'])->name('admin.options.create')->middleware('admin');
     Route::post('options/create', [App\Http\Controllers\admin\optionsController::class, 'store'])->name('admin.options.store')->middleware('admin');
     Route::get('options/show/{id}', [App\Http\Controllers\admin\optionsController::class, 'show'])->name('admin.options.show')->middleware('admin');
     Route::get('options/edit/{id}', [App\Http\Controllers\admin\optionsController::class, 'edit'])->name('admin.options.edit')->middleware('admin');
     Route::put('options/update/{id}', [App\Http\Controllers\admin\optionsController::class, 'update'])->name('admin.options.update')->middleware('admin');
     Route::get('options/delete/{id}', [App\Http\Controllers\admin\optionsController::class, 'destroy'])->name('admin.options.destroy')->middleware('admin');

//     // Results
  Route::get('results/destroy', [App\Http\Controllers\admin\ResultsController::class, 'massDestroy'])->name('results.massDestroy')->middleware('admin');
    Route::get('results',  [App\Http\Controllers\admin\ResultsController::class, 'index'])->name('admin.results.index')->middleware('admin');
    Route::get('results/create',  [App\Http\Controllers\admin\ResultsController::class, 'create'])->name('admin.results.create')->middleware('admin');
    Route::post('results/create/store',  [App\Http\Controllers\admin\ResultsController::class, 'store'])->name('admin.results.store')->middleware('admin');
    Route::get('results/show/{id}',  [App\Http\Controllers\admin\ResultsController::class, 'show'])->name('admin.results.show')->middleware('admin');
    Route::get('results/edit/{id}',  [App\Http\Controllers\admin\ResultsController::class, 'edit'])->name('admin.results.edit')->middleware('admin');
    Route::put('results/update/{id}',  [App\Http\Controllers\admin\ResultsController::class, 'update'])->name('admin.results.update')->middleware('admin');
    Route::get('results/delete/{id}',  [App\Http\Controllers\admin\ResultsController::class, 'destroy'])->name('admin.results.destroy')->middleware('admin');
// });
});
//admin nuur
Route::get('/dashboard/chart', [App\Http\Controllers\ChartJSController::class, 'index'])->name('chart.index')->middleware('admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify'=>true]);