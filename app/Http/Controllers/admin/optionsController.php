<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOptionRequest;
use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Models\option;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class optionsController extends Controller
{
    public function index()
    {
       

        $options = Option::all();
      //dd($options);
        return view('admin.admin.options.index', compact('options'));
    }

    public function create()
    {
        $questions = Question::all()->pluck('question_text', 'id')->prepend(trans('--Сонго--'), '');

        return view('admin.admin.options.create', compact('questions'));
    }

    public function store(StoreOptionRequest $request)
    {
        $option = Option::create($request->all());

        return redirect('/options')->with('message','Амжилттай Үүслээ');
    }

    public function edit($id)
    {
        $option = option::findOrFail($id);
        $questions = Question::all()->pluck('question_text', 'id')->prepend(trans('--Сонго--'), '');

        $option->load('question');

        return view('admin.admin.options.edit', compact('questions', 'option'));
    }

    public function update(Request $request,$id)
    {
        
        $option = Option::FindOrFail($id)->update($request->all());
        return redirect('/options')->with('message','Амжилттай Шинэчлэгдлээ');
        
    }

    public function show($id)
    {
        $option = Option::findOrFail($id);

        return view('admin.admin.options.show', compact('option'));
       
    }

    public function destroy($id)
    {
       
        $option = Option::findOrFail($id);
        $option->delete();

        return redirect('/options')->with('message','Амжилттай Устлаа');
    }

    public function massDestroy(MassDestroyOptionRequest $request)
    {
        Option::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
