<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionsController extends Controller
{
    public function index()
    {
       

        $questions = Question::all();

        return view('admin.admin.questions.index', compact('questions'));
    }

    public function create()
    {
        

        // $categories = Category::all()->pluck('name', 'id')->prepend(trans('--Сонго--'), '');

        return view('admin.admin.questions.create');
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create($request->all());

        //return redirect()->route('admin.admin.questions.index');
        return redirect('/questions')->with('message','Амжилттай Нэмэгдлээ');
    }

    public function edit($id, Question $request)
    {
        
        $question = Question::find($id);
        
        //$categories = Category::all()->pluck('name', 'id')->prepend(trans('--Сонго--'), '');
      
        //$question->load('category');
         //dd($question);
         //dd($categories);
        return view('admin.admin.questions.edit', compact( 'question'));
    }

    public function update(Request $request,$id)
    {
       
        $question = Question::FindOrFail($id)->update($request->all());
             
             
        return redirect('/questions')->with('message','Амжилттай Шинэчлэгдлээ');
    }


    public function show($id)
    { $question = Question::findOrFail($id);

        return view('admin.admin.questions.show', compact('question'));
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
