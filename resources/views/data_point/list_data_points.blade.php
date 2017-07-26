@extends('layout.default')

@section('content')
    <h1>Data Points</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Metric Name</th>
            <th>Date</th>
            <th>Integer</th>
            <th>Decimal</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dataPoints as $dataPoint)
            <tr>
                <td>{{ $dataPoint->id }}</td>
                <td>{{ $dataPoint->metric->name }}</td>
                <td>{{ $dataPoint->date_value }}</td>
                <td>{{ $dataPoint->integer_value }}</td>
                <td>{{ $dataPoint->decimal_value }}</td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
