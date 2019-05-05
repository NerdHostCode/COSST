<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Knowledgebase;
use Auth;
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
        if (Auth::check()) {
            $knowledgebaseArticles = Knowledgebase::where('hidden', '!=', '1')
                ->orderBy('views')
                ->limit(3)
                ->get();
        } else {
            $knowledgebaseArticles = Knowledgebase::where('hidden', '!=', '1')
                ->where('registered', '!=', '1')
                ->orderBy('views')
                ->limit(3)
                ->get();
        }

        return view('knowledgebase', compact('knowledgebaseArticles'));
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Knowledgebase $knowledgebase
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Knowledgebase $knowledgebase
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Knowledgebase       $knowledgebase
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knowledgebase $knowledgebase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Knowledgebase $knowledgebase
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knowledgebase $knowledgebase)
    {
        //
    }
}
