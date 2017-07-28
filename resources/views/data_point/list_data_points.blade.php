@extends('layout.default')

@section('content')
    <h1>Data Points</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDataPoint">
        Create
    </button>

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
        <tbody id="tableBody">
        @foreach($dataPoints as $dataPoint)
            <tr data-row-id="{{ $dataPoint->id }}">
                <td>{{ $dataPoint->id }}</td>
                <td class="metric-name">{{ $dataPoint->metric->name }}</td>
                <td class="date-value">{{ $dataPoint->date_value }}</td>
                <td class="integer-value">{{ $dataPoint->integer_value }}</td>
                <td class="decimal-value">{{ $dataPoint->decimal_value }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-edit-id="{{ $dataPoint->id }}">Edit</button>
                    <button type="button" class="btn btn-danger" data-destroy-id="{{ $dataPoint->id }}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modalDataPoint" tabindex="-1" role="dialog" aria-labelledby="modalDataPointLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create DataPoint</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" value="0">
                        <div class="form-group">
                            <label for="metric_id">Metric</label>
                            <select name="metric_id" class="form-control">
                                <option value=""  data-data-type="">Select...</option>
                                @foreach($metrics as $metric)
                                    <option value="{{ $metric->id }}" data-data-type="{{ $metric->data_type }}">{{ $metric->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--TODO: implement a Date Picker--}}
                        <div class="form-group">
                            <label for="date_value">Date</label>
                            <input type="date" class="form-control" id="date_value" name="date_value" placeholder="YYYY-MM-DD">
                        </div>
                        <div class="form-group integer" style="display: none">
                            <label for="integer_value">Integer</label>
                            <input type="number" class="form-control" id="integer_value" name="integer_value" placeholder="" maxlength="11">
                        </div>
                        <div class="form-group decimal" style="display: none">
                            <label for="decimal_value">Decimal</label>
                            <input type="text" class="form-control" id="decimal_value" name="decimal_value" placeholder="" maxlength="11">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/api.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/modal.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataPoint.js') }}" type="text/javascript"></script>
@endsection
