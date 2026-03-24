<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;

class CareerTestController extends Controller
{
    public function index()
    {
        $questions = Question::with('options')->get();

        return view('cms.student.test',compact('questions'));
    }

    public function submit(Request $request)
    {

        $student = auth()->user()->student;

        foreach($request->answers as $question_id=>$option_id){

            StudentAnswer::create([
                'student_id'=>$student->id,
                'question_id'=>$question_id,
                'option_id'=>$option_id
            ]);

        }

        return redirect(route('career.result'))->with('success', 'Profile saved successfully');
    }
}
