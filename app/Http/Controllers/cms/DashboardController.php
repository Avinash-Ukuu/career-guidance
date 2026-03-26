<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Skill;
use App\Models\StudentAnswer;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(auth()->user()->role == 'admin')
        {
            $totalStudents  = User::where('role','student')->count();
            $totalCareers   = Career::count();
            $totalSkills    = Skill::count();

            $totalTests     = StudentAnswer::distinct('student_id')->count('student_id');

            return view('cms.dashboard', compact('totalStudents', 'totalCareers', 'totalSkills', 'totalTests'));
        }else{
            $student        =   auth()->user()->student;
            $answers        =   StudentAnswer::where('student_id', $student->id)->with('question')->get();

            $skillScores    =   [];

            foreach ($answers as $ans) {
                $skill_id = $ans->question->skill_id;

                if (!isset($skillScores[$skill_id])) {
                    $skillScores[$skill_id] = 0;
                }

                $skillScores[$skill_id] += $ans->score;
            }

            $topSkill = null;
            $career = null;

            if (!empty($skillScores)) {
                $topScore = max($skillScores);
                $topSkillId = array_search($topScore, $skillScores);

                $topSkill = Skill::find($topSkillId);

                $career = Career::whereHas('skills', function ($q) use ($topSkillId) {
                    $q->where('skills.id', $topSkillId);
                })->first();
            }

            $totalTests = StudentAnswer::where('student_id', $student->id)->count();

            return view('cms.dashboard', compact(
                'student',
                'totalTests',
                'topSkill',
                'career'
            ));
        }

    }
}
