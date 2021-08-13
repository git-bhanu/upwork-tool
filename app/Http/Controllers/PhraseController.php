<?php

namespace App\Http\Controllers;

use App\Models\Phrases;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phrases = Phrases::all();

        return view('phrase.index',compact('phrases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phrase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phrases  $phrases
     * @return \Illuminate\Http\Response
     */
    public function show(Phrases $phrases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phrases  $phrases
     * @return \Illuminate\Http\Response
     */
    public function edit(Phrases $phrases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phrases  $phrases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phrases $phrases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phrases  $phrases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phrases $phrases)
    {
        //
    }
}
