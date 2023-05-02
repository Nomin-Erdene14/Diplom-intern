<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResultRequest;
use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Question;
use App\Models\Result;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResultsController extends Controller
{
    public function index()
    {
       
        $results = Result::all();

        return view('admin.admin.results.index', compact('results'));
    }

    public function create()
    {
        
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::all()->pluck('question_text', 'id');

        return view('admin.admin.results.create', compact('users', 'questions'));
    }

    public function store(StoreResultRequest $request)
    {
        $result = Result::create($request->all());
        $result->questions()->sync($request->input('questions', []));
        //dd($result);
        return redirect('/results')->with('message','Амжилттай Нэмэгдлээ');
    }

    public function edit($id,Result $result)
    {
        $result = Result::find($id);
       
        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questions = Question::all()->pluck('question_text', 'id');

        $result->load('user', 'questions');

        return view('admin.admin.results.edit', compact('users', 'questions', 'result'));
    }

    public function update(UpdateResultRequest $request, Result $result,$id)
    { 
       
        $result= Result::FindOrFail($id)->update($request->all());
   
        //$result->questions()->sync($input['questions']);
      
        

        return redirect('/results')->with('message','Амжилттай шинэчлэгдлээ');
    }

    public function show($id,Result $result)
    {
       
        $result= Result::findOrFail($id);
        $result->load('user', 'questions');
       //dd($result);
        return view('admin.admin.results.show', compact('result'));
    }

    public function destroy( $id)
    {
        
        $result = Result::find($id);
        $result->delete();

        return redirect('/results')->with('message','Амжилттай Устлаа');
    }

    public function massDestroy(MassDestroyResultRequest $request)
    {
        Result::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
