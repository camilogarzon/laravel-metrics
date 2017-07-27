<?php

namespace App\Http\Controllers;

use App\Metric;
use App\DataPoint;
use Illuminate\Http\Request;
use DB;

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
        $metrics = Metric::where('id','>', 0)->orderBy('name', 'asc')->get();

        $viewData = ['dataPoints' => $dataPoints, 'metrics' => $metrics];
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
        $response = [
            'valid' => false,
            'model' => null
        ];
        if($request->ajax()) {

            // TODO: validate data
            $dataPoint = new DataPoint();
            $dataPoint->metric_id = $request->input('metric_id');
            $dataPoint->date_value = date('Y-m-d', strtotime($request->input('date_value')));

            $dataPoint->integer_value = ( !empty($request->input('integer_value')) ) ?
                floatval($request->input('integer_value')) : NULL;

            $dataPoint->decimal_value = ( !empty($request->input('decimal_value')) ) ?
                floatval($request->input('decimal_value')) : NULL;

            $dataPoint->save();

            $dataPoint->load('Metric');

            $response = [
                'valid' => true,
                'model' => $dataPoint->toArray()
            ];
        }
        return response()->json($response);
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
        $dataPoint->load('Metric');

        return response()->json([
            'valid' => true,
            'model' => $dataPoint->toArray()
        ]);
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
        $response = [
            'valid' => false,
            'model' => null
        ];
        if($request->ajax()) {

            // TODO: validate data
            $dataPoint->metric_id = $request->input('metric_id');
            $dataPoint->date_value = date('Y-m-d', strtotime($request->input('date_value')));

            $dataPoint->integer_value = ( !empty($request->input('integer_value')) ) ?
                floatval($request->input('integer_value')) : NULL;

            $dataPoint->decimal_value = ( !empty($request->input('decimal_value')) ) ?
                floatval($request->input('decimal_value')) : NULL;

            $dataPoint->save();

            $dataPoint->load('Metric');

            $response = [
                'valid' => true,
                'model' => $dataPoint->toArray()
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataPoint  $dataPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataPoint $dataPoint)
    {
        $dataPointDeleted = clone $dataPoint;
        $dataPoint->delete();
        return response()->json([
            'valid' => true,
            'model' => $dataPointDeleted->toArray()
        ]);
    }

    public function dataPointTable () {
        $dataPointDates = DataPoint::select('date_value')->orderBy('date_value', 'asc')->distinct()->get();

        $dataPoints = DataPoint::select(DB::raw('metric_id, date_value, sum(integer_value) as integer_value, sum(decimal_value) as decimal_value'))
            ->groupBy('metric_id')
            ->groupBy('date_value')
            ->get()->toArray();

        $metrics = Metric::where('id','>', 0)->orderBy('name', 'asc')->get();

        $viewData = ['dataPointDates' => $dataPointDates, 'dataPoints' => $dataPoints, 'metrics' => $metrics];
        return view('data_point.table_data_points')->with($viewData);
    }

    public function dataPointChart () {

        echo 'TODO CHARTS';
    }
}
