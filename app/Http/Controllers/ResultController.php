<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use Pdf;
use App\Notifications\EmailNotification;
use File;

class ResultController extends Controller
{
    public function show($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
            $query->whereId(auth()->id());
        })->findOrFail($result_id);
    
    return view('admin.client.results', compact('result'));
    }

    public function send($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
                $query->whereId(auth()->id());
            })->findOrFail($result_id);
        $filename = $result->id . '.pdf';
        $pdf = PDF::loadView('admin.client.pdf', compact('result'));
        $pdf->save(storage_path($filename));

        auth()->user()->notify(new EmailNotification($result));
        File::delete(storage_path($filename));

        return redirect()->route('results.show', $result->id)->withStatus('Your test result has been sent successfully!');
    }
}
