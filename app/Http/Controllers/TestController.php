<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Option;
use App\Models\Result;
use App\Models\Question;
use App\Http\Requests\StoreTestRequest;

class TestController extends Controller
{
    public function index()
    
    {
        // $categories = Category::with(['categoryQuestions' => function ($query) {
        //         $query->inRandomOrder()
        //             ->with(['questionOptions' => function ($query) {
        //                 $query->inRandomOrder();
        //             }]);
        //     }])
        //     ->whereHas('categoryQuestions')
        //     ->get();
        $questions = Question::all();

        return view('admin.client.test',compact('questions'));
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points')
        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                        'option_id' => $option->id,
                        'points' => $option->points
                    ]
                ];
            })->toArray();

        $result->questions()->sync($questions);

        return redirect()->route('results.show', $result->id);
    }
}
