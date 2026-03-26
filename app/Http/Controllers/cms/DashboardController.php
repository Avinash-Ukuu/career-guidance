<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Skill;
use App\Models\StudentAnswer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalStudents  = User::where('role','student')->count();
        $totalCareers   = Career::count();
        $totalSkills    = Skill::count();

        $totalTests     = StudentAnswer::distinct('student_id')->count('student_id');

        return view('cms.dashboard', compact('totalStudents', 'totalCareers', 'totalSkills', 'totalTests'));
    }
}
