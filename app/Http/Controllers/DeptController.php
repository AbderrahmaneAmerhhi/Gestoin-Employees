<?php

namespace App\Http\Controllers;

use App\Models\dept;
use App\Http\Requests\StoredeptRequest;
use App\Http\Requests\UpdatedeptRequest;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Dashboeard.dept.index');

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
     * @param  \App\Http\Requests\StoredeptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredeptRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function show(dept $dept)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function edit(dept $dept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedeptRequest  $request
     * @param  \App\Models\dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedeptRequest $request, dept $dept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function destroy(dept $dept)
    {
        //
    }
}
