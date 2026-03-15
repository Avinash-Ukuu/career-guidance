<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers    =  Career::with('skills')->orderBy('created_at','desc')->get();

        return view('cms.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']             =   new Career();
        $data['method']             =   'POST';
        $data['url']                =   route('cms.career.store');
        $data['skills']             =   Skill::all();

        return view('cms.career.form',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'description'           => 'required|string',
            'education_required'   => 'required|string',
            'average_salary'       => 'required|string',
            'future_scope'         => 'required|string',
        ]);

        $career                         =   new Career();
        $career->name                   =   $request->name;
        $career->description            =   $request->description;
        $career->education_required     =   $request->education_required;
        $career->average_salary         =   $request->average_salary;
        $career->future_scope           =   $request->future_scope;
        $career->save();

        if($request->skills){
            $career->skills()->attach($request->skills);
        }

        Session::flash("success","Data Saved");

        return redirect(route('cms.career.index'));
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
        $data['object']             =   Career::find($id);
        if(empty($data['object']))
        {
            Session::flash('error','Data not found');

            return redirect(route('cms.career.index'));
        }
        $data['method']             =   'PUT';
        $data['url']                =   route('cms.career.update',['career'=>$id]);
        $data['skills']             =   Skill::all();

        return view('cms.career.form',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'description'           => 'required|string',
            'education_required'   => 'required|string',
            'average_salary'       => 'required|string',
            'future_scope'         => 'required|string',
        ]);

        $career                         =   Career::findOrFail($id);
        $career->name                   =   $request->name;
        $career->description            =   $request->description;
        $career->education_required     =   $request->education_required;
        $career->average_salary         =   $request->average_salary;
        $career->future_scope           =   $request->future_scope;

        $career->update();

        if($request->skills)
        {
            $career->skills()->sync($request->skills);
        }
        else
        {
            $career->skills()->sync([]);
        }

            Session::flash("success","Data Updated");

            return redirect(route('cms.career.index'));
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
