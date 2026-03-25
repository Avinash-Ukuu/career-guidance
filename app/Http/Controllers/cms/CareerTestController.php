<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Option;
use App\Models\Question;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CareerTestController extends Controller
{
    public function index()
    {
        $questions = Question::with('options')->get();

        return view('cms.student.test',compact('questions'));
    }

    public function submit(Request $request)
    {
        $student      =       Auth::user()->student;
        StudentAnswer::where('student_id', $student->id)->delete();

        foreach($request->answers as $question_id=>$option_id){

            $option = Option::find($option_id);
            StudentAnswer::create([
                'student_id'    =>  $student->id,
                'question_id'   =>  $question_id,
                'option_id'     =>  $option_id,
                'score'         =>  $option->score
            ]);

        }

        return redirect(route('cms.careerResult'))->with('success', 'Test Completed Successfully');
    }

    public function result()
    {
        $student        =   Auth::user()->student;
        $answers        =   StudentAnswer::where('student_id', $student->id)->with('question')->get();

        $skillScores    =   [];

        foreach ($answers as $ans) {
            $skill_id   =   $ans->question->skill_id;

            if (!isset($skillScores[$skill_id])) {
                $skillScores[$skill_id] =   0;
            }

            $skillScores[$skill_id]     +=  $ans->score;
        }

        $topSkillId     =   array_keys($skillScores, max($skillScores))[0];
        $career         =   Career::where('skill_id', $topSkillId)->first();

        return view('cms.student.result', compact('career','skillScores'));
    }
}
