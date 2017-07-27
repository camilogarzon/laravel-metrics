<?php

namespace App\Http\Controllers;

use App\Metric;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metrics = Metric::all();
        $viewData = ['metrics' => $metrics];
        return view('metric.list_metrics')->with($viewData);
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
        $response = [
            'valid' => false,
            'model' => null
        ];
        if($request->ajax()) {

            // TODO: validate data
            $metric = new Metric();
            $metric->name = $request->input('name');
            $metric->data_type = $request->input('data_type');
            $metric->save();

            $response = [
                'valid' => true,
                'model' => $metric->toArray()
            ];
        }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Metric  $metric
     * @return \Illuminate\Http\Response
     */
    public function show(Metric $metric)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Metric  $metric
     * @return \Illuminate\Http\Response
     */
    public function edit(Metric $metric)
    {
        return response()->json([
            'valid' => true,
            'model' => $metric->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Metric  $metric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metric $metric)
    {
        $response = [
            'valid' => false,
            'model' => null
        ];
        if($request->ajax()) {

            // TODO: validate data
            $metric->name = $request->input('name');
            $metric->data_type = $request->input('data_type');
            $metric->save();

            $response = [
                'valid' => true,
                'model' => $metric->toArray()
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Metric  $metric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metric $metric)
    {
        $metricDeleted = clone $metric;

        foreach ($metric->dataPoints as $dataPoint) {
            $dataPoint->delete();
        }

        $metric->delete();

        return response()->json([
            'valid' => true,
            'model' => $metricDeleted->toArray()
        ]);
    }
}
