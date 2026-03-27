<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Option;
use App\Models\Question;
use App\Models\Skill;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CareerTestController extends Controller
{
    public function index()
    {

        $skillIds   = DB::table('student_skill')->where('student_id', Auth::user()->student->id)->pluck('skill_id');
        $questions  = Question::with('options')->whereIn('skill_id', $skillIds)->get();

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

        if (empty($skillScores)) {
            return view('cms.student.result', [
                'careers' => collect(),
                'skillScores' => [],
                'skills' => []
            ])->with('error', 'Please complete the test first.');
        }

        $skills         =   Skill::whereIn('id', array_keys($skillScores))->pluck('name', 'id');
        $topSkillId     =   array_keys($skillScores, max($skillScores))[0];
        $careers        =   Career::with('roadmaps')->whereHas('skills', function ($q) use ($topSkillId) {
                                    $q->where('skills.id', $topSkillId);
                                })->get();

        return view('cms.student.result', compact('careers','skillScores','skills'));
    }
}
