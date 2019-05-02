<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Knowledgebase;
use Illuminate\Http\Request;

class KnowledgebaseController extends Controller
{
    public function __construct()
    {
        if (!Configuration::get('KBAllowUnregistered')) {
            $this->middleware('auth');
            $this->middleware('user');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Knowledgebase  $knowledgebase
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Knowledgebase  $knowledgebase
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Knowledgebase  $knowledgebase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Knowledgebase  $knowledgebase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledgebase $knowledgebase)
    {
        //
    }
}
