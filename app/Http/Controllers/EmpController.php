<?php

namespace App\Http\Controllers;

use App\Models\emp;
use App\Http\Requests\StoreempRequest;
use App\Http\Requests\UpdateempRequest;

class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Dashboeard.emp.index');
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
     * @param  \App\Http\Requests\StoreempRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreempRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function show(emp $emp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function edit(emp $emp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateempRequest  $request
     * @param  \App\Models\emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateempRequest $request, emp $emp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\emp  $emp
     * @return \Illuminate\Http\Response
     */
    public function destroy(emp $emp)
    {
        //
    }
}
