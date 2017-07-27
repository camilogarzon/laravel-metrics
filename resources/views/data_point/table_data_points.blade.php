@extends('layout.default')

@section('content')
    <h1>Data Points Table</h1>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Metric Name</th>
            <th>Data Type</th>

            @foreach($dataPointDates as $date)
                <th>{{ $date->date_value }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($metrics as $metric)
            <tr>
                <td>{{ $metric->name }}</td>
                <td>{{ $metric->data_type }}</td>
                @foreach($dataPointDates as $date)
                    <td>
                        @foreach($dataPoints as $dataPoint)
                            @if($dataPoint['metric_id'] == $metric->id && $date->date_value == $dataPoint['date_value'])
                                {{ $dataPoint[$metric->data_type.'_value'] }}
                            @endif
                        @endforeach
                    </td>
                @endforeach
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
