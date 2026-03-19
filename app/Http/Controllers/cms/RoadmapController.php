<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Roadmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoadmapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers   =   Career::orderBy('created_at','desc')->get();

        return view('cms.roadmap.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'career_id'     => 'required',
            'title'         => 'required',
            'step'          => 'required|integer',
            'description'   => 'required'
        ]);

        Roadmap::updateOrCreate(
            ['id' => $request->id],
            [
                'career_id'     => $request->career_id,
                'title'         => $request->title,
                'step'          => $request->step,
                'description'   => $request->description,
            ]
        );

        return back()->with('success', 'Roadmap added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function manage($career_id)
    {
        $career     =   Career::with('roadmaps')->find($career_id);
        if(empty($career))
        {
            Session::flash('error','Data not found');

            return redirect(route('cms.roadmap.index'));
        }

        return view('cms.roadmap.form', compact('career'));
    }
}
