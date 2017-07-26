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
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($metrics as $metric)
            <tr>
                <td>{{ $metric->id }}</td>
                <td>{{ $metric->name }}</td>
                <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
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
                    <h5 class="modal-title" id="modal_title">Create Metric</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" value="3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Metric Name">
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="formGroupExampleInput2">Another label</label>--}}
                            {{--<input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">--}}
                        {{--</div>--}}
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

    <script type="text/javascript">

        var Api = {
            initialize: function(endpoint) {
            },

            cursorBusy : function() {
                $('body').css('cursor', 'wait');
            },

            cursorNormal : function() {
                $('body').css('cursor', '');
            },

            successDefaultAjaxRequest : function(data, textStatus, jqXHR) {
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
            },

            errorDefaultAjaxRequest : function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                alert('Error: ' + textStatus + '. \n\n' + errorThrown);
            },

            ajax: function(data, url, method, onSuccess, onError) {
                Api.cursorBusy();
                onSuccess = (onSuccess) ? onSuccess : Api.successDefaultAjaxRequest;
                onError = (onError) ? onError : Api.errorDefaultAjaxRequest;
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': csrfToken },
                    data: data,
                    type: method,
                    dataType: "json",
                    url: url,
                    success: function(data, textStatus, jqXHR) {
                        Api.cursorNormal();
                        onSuccess(data, textStatus, jqXHR);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Api.cursorNormal();
                        onError(jqXHR, textStatus, errorThrown);
                    }
                });
            }
        };

        var Modal = {
            modalId : null,
            form : null,

            initialize: function(modalId) {
                this.modalId = $('#'+modalId);
                this.form = this.modalId.find('form');
                console.log('init Modal');
                console.log('init '+modalId);

                this.modalId.find('.btn-save').click(Modal.save);

            },

            clearForm : function() {
                this.form.find('input').each(function(i, e){
                    $(e).val('');
                });
                this.form.find('[name="id"]').val(0);
            },

            close : function() {
                this.modalId.find('.btn-close').trigger('click');
                this.clearForm();
            },

            refreshTable : function() {
                // refresh the table
                // TODO: refresh using ajax
                window.location.reload();
            },

            save : function(event) {
                console.log(event);
                var objectId = Modal.form.find('[name="id"]').val();
                var data = Modal.form.serialize();
                if (objectId > 0) {
                    Api.ajax(data, rootUrl + 'metrics/' + objectId, 'put', Modal.update);
                } else {
                    Api.ajax(data, rootUrl + 'metrics', 'post', Modal.store);
                }
                Modal.close();
                Modal.refreshTable();
            },

            store : function(data) {
                console.log('store');
                console.log(data);
                console.log(textStatus);
                console.log(jqXHR);
            },

            update : function(data) {
                console.log('update');
                console.log(data);
            }

        };


        var Metric = {
            self : this,
            Api: null,
            Modal: null,
            initialize: function() {
                this.Api = Api;
                this.Api.initialize('metrics');
                this.Modal = Modal;
                this.Modal.initialize('modalMetric');
            }
        };


        $(function() {
            Metric.initialize();
        });
    </script>
@endsection
