<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoregradesRequest;
use App\Http\Requests\UpdategradesRequest;
use App\Models\grades;

class GradesController extends Controller
{
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
     * @param  \App\Http\Requests\StoregradesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregradesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function show(grades $grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function edit(grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategradesRequest  $request
     * @param  \App\Models\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategradesRequest $request, grades $grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function destroy(grades $grades)
    {
        //
    }
}
