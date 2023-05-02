<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Requests\MassDestroyCategoryRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Gate;

use Symfony\Component\HttpFoundation\Response;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobindex($id)
    {
        $jobs =Job::where('category_id',$id)->paginate(5);
        $categories = Category::all();
        $categoryName = Category::where('id',$id)->first();
        //$jobs= Job::where('category_id',$id)->get();
        return view('jobs.jobs-category', compact('jobs','categories','categoryName'));

        
    }

    public function index()
    {
        $categories = Category::all();
       
        return view('admin.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.admin.categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());

        return redirect('/admin/categories')->with('message','Амжилттай Нэмэгдлээ');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.admin.categories.edit', compact('category'));
    }

    public function update(Request $request,$id)
    {
        
        $category = Category::FindOrFail($id)->update([
            'name' => $request->name,
             ]);
        return redirect('/admin/categories/');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
         return view('admin.admin.categories.show', compact('category'));
    }
    public function destroy($id)
{
    $category = Category::find($id);
    $category->jobs()->delete(); // See below
    $category->delete();
    return back()->with('message','Амжилттай Устлаа');
}
    public function massDestroy(MassDestroyCategoryRequest $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
