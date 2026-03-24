<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    public function information()
    {
        $student    =   Student::with('skills')->where('user_id', Auth::id())->first();
        $skills     =   Skill::all();

        return view('cms.student.info', compact('student', 'skills'));
    }

    public function storeInformation(Request $request)
    {
        $request->validate([
            'education' => 'required|string|max:255',
            'interests' => 'required|string|max:500',
            'skills'    => 'required|array|min:1',
            'skills.*'  => 'exists:skills,id',
        ]);

        $user       =   Auth::user();
        $student    =   $user->student;

        if (!$student) {
            $student = $user->student()->create([]);
        }

        $student->update([
            'education' => $request->education,
            'interests' => $request->interests,
        ]);

        $student->skills()->sync($request->skills);

        return redirect()
            ->back()
            ->with('success', 'Profile saved successfully');
    }
}
