@extends('layout.default')

@section('content')
    <h1>Metrics</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMetric">
        Create
    </button>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Data Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="tableBody">
        @foreach($metrics as $metric)
            <tr data-row-id="{{ $metric->id }}">
                <td>{{ $metric->id }}</td>
                <td class="name">{{ $metric->name }}</td>
                <td class="data_type">{{ $metric->data_type }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-edit-id="{{ $metric->id }}">Edit</button>
                    <button type="button" class="btn btn-danger" data-destroy-id="{{ $metric->id }}">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modalMetric" tabindex="-1" role="dialog" aria-labelledby="modalMetricLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Metric</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" value="0">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="data_type">Data Type</label>
                            <select name="data_type" class="form-control">
                                <option value="">Select...</option>
                                <option value="integer">Integer</option>
                                <option value="decimal">Decimal (9,2)</option>
                            </select>
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
    <script src="{{ asset('js/metric.js') }}" type="text/javascript"></script>
@endsection
