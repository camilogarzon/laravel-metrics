
var Metric = {
    Modal: null,
    initialize: function() {
        this.Modal = Modal;
        this.Modal.initialize({
            modelName: 'Metric',
            modalId: 'modalMetric',
            tableBodyId: 'tableBody',
            ajaxUrl : window.rootUrl + 'metrics',
            callback: {
                save: this.save,
                store: this.store,
                edit: this.edit,
                update: this.update,
                destroy: this.destroy
            }
        });

    },

    save : function(event) {
    },

    store : function(data) {
        var row = '<tr data-row-id="' + data.model.id + '"><td>' + data.model.id + '</td>' +
            '<td class="name">' + data.model.name + '</td>' +
            '<td class="data_type">' + data.model.data_type + '</td>' +
            '<td><button type="button" class="btn btn-primary" data-edit-id="' + data.model.id + '">Edit</button><button type="button" class="btn btn-danger" data-destroy-id="' + data.model.id + '">Delete</button></td></tr>';
        Metric.Modal.tableBody.append(row);
        Metric.Modal.bindTableEvents(data.model.id);
    },

    edit : function(data) {
        Metric.Modal.form.find('[name="name"]').val(data.model.name);
        Metric.Modal.form.find('[name="data_type"]').val(data.model.data_type);
    },

    update : function(data) {
        var row = DataPoint.Modal.tableBody.find('[data-row-id="' + data.model.id + '"]');
        row.find('.name').html(data.model.name);
        row.find('.data_type').html(data.model.data_type);

    },

    destroy : function(data) {
    }
};


$(function() {
    Metric.initialize();
});
