<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderBy('created_at','desc')->get();

        return view('cms.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']             =   new Skill();
        $data['method']             =   'POST';
        $data['url']                =   route('cms.skill.store');

        return view('cms.skill.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255'
        ]);

        $skill          =   new skill();
        $skill->name    =   $request->name;

        $skill->save();

        Session::flash("success","Data Saved");

        return redirect(route('cms.skill.index'));
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
        $data['object']             =   Skill::find($id);
        if(empty($data['object']))
        {
            Session::flash('error','Data not found');

            return redirect(route('cms.skill.index'));
        }
        $data['method']             =   'PUT';
        $data['url']                =   route('cms.skill.update',['skill'=>$id]);

        return view('cms.skill.form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
        ]);

        $skill                 =   Skill::findOrFail($id);
        $skill->name           =   $request->name;

        $skill->update();

        Session::flash("success","Data Updated");

        return redirect(route('cms.skill.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
