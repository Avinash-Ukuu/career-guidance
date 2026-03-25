<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options    =   Option::with('question')->latest()->get();
        $questions  =   Question::all();

        return view('cms.option.index', compact('options','questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['object']     =   new Option();
        $data['method']     =   'POST';
        $data['url']        =   route('cms.option.store');
        $data['questions']  =   Question::all();

        return view('cms.option.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question_id'   => 'required|exists:questions,id',
            'option_text'   => 'required|string|max:255',
            'score'         => 'required|integer|min:0|max:10',
        ]);

        Option::create($request->all());

        return redirect(route('cms.option.index'))->with('success', 'Option Created');
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
        $data['object']     =   Option::find($id);
        if(empty($data['object']))
        {
            Session::flash('error','Data not found');

            return redirect(route('cms.option.index'));
        }
        $data['method']     =   'PUT';
        $data['url']        =   route('cms.option.update',['option' => $id]);
        $data['questions']  =   Question::all();

        return view('cms.option.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question_id'   => 'required|exists:questions,id',
            'option_text'   => 'required|string|max:255',
            'score'         => 'required|integer|min:0|max:10',
        ]);

        $option     =       Option::find($id);
        $option->update($request->all());

        return redirect()->route('cms.option.index')->with('success', 'Option Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
