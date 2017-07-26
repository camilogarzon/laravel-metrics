<?php

namespace App\Http\Controllers;

use App\DataPoint;
use Illuminate\Http\Request;

class DataPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPoints = DataPoint::all();
        $viewData = ['dataPoints' => $dataPoints];
        return view('data_point.list_data_points')->with($viewData);
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
     * @param  \App\DataPoint  $dataPoint
     * @return \Illuminate\Http\Response
     */
    public function show(DataPoint $dataPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataPoint  $dataPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(DataPoint $dataPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataPoint  $dataPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPoint $dataPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPoint  $dataPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPoint $dataPoint)
    {
        //
    }
}
