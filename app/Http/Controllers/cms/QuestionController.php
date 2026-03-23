<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('skill')->get();

        return view('cms.question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']     =   new Question();
        $data['method']     =   'POST';
        $data['url']        =   route('cms.question.store');
        $data['skills']     =   Skill::all();

        return view('cms.question.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question'          => 'required|string',
            'skill_id'          => 'required|integer',
        ]);

        $question               =   new Question();
        $question->question     =   $request->question;
        $question->skill_id     =   $request->skill_id;

        $question->save();
        Session::flash("success","Data Stored");

        return redirect()->route('cms.question.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['object']     =   Question::find($id);
        if(empty($data['object']))
        {
            Session::flash('error','Data not found');

            return redirect(route('cms.question.index'));
        }
        $data['method']     =   'PUT';
        $data['url']        =   route('cms.question.update',['question' => $id]);
        $data['skills']     =   Skill::all();

        return view('cms.question.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question'          => 'required|string',
            'skill_id'          => 'required|integer',
        ]);

        $question               =   Question::findOrFail($id);
        $question->question     =   $request->question;
        $question->skill_id     =   $request->skill_id;

        $question->update();
        Session::flash("success","Data Updated");

        return redirect()->route('cms.question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
