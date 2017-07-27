
var DataPoint = {
    Modal: null,
    selectMetric: null,
    dataTypeInteger: null,
    dataTypeDecimal: null,
    initialize: function() {
        this.Modal = Modal;
        this.Modal.initialize({
            modelName: 'Data Point',
            modalId: 'modalDataPoint',
            tableBodyId: 'tableBody',
            ajaxUrl : window.rootUrl + 'data_points',
            callback: {
                save: this.save,
                store: this.store,
                edit: this.edit,
                update: this.update,
                destroy: this.destroy
            }
        });

        this.selectMetric = this.Modal.form.find('[name="metric_id"]');
        this.dataTypeInteger = this.Modal.form.find('.integer');
        this.dataTypeDecimal = this.Modal.form.find('.decimal');

        this.selectMetric.change(this.changeMetric);
        this.setDataType();

    },

    setDataType : function() {
        var dataType = DataPoint.selectMetric.children('option:selected').data('data-type');
        DataPoint.dataTypeInteger.hide().find('input').val('');
        DataPoint.dataTypeDecimal.hide().find('input').val('');
        if (dataType == 'integer') {
            DataPoint.dataTypeInteger.show();
        } else if (dataType == 'decimal') {
            DataPoint.dataTypeDecimal.show();
        }
    },

    changeMetric : function(event){
        DataPoint.setDataType();
    },

    save : function(event) {
    },

    store : function(data) {
        var integerValue = (data.model.integer_value !== undefined && data.model.integer_value !== null) ?
            data.model.integer_value : "";
        var decimalValue = (data.model.decimal_value !== undefined && data.model.decimal_value !== null) ?
            data.model.decimal_value : "";

        var row = '<tr data-row-id="' + data.model.id + '"><td>' + data.model.id + '</td>' +
            '<td class="metric-name">' + data.model.metric.name + '</td>' +
            '<td class="date-value">' + data.model.date_value + '</td>' +
            '<td class="integer-value">' + integerValue + '</td>' +
            '<td class="decimal-value">' + decimalValue + '</td>' +
            '<td><button type="button" class="btn btn-primary" data-edit-id="' + data.model.id + '">Edit</button><button type="button" class="btn btn-danger" data-destroy-id="' + data.model.id + '">Delete</button></td></tr>';
        DataPoint.Modal.tableBody.append(row);
        DataPoint.Modal.bindTableEvents(data.model.id);
    },

    edit : function(data) {
        DataPoint.Modal.form.find('[name="metric_id"]').val(data.model.metric.id);
        DataPoint.setDataType();


        DataPoint.Modal.form.find('[name="date_value"]').val(data.model.date_value);
        DataPoint.Modal.form.find('[name="integer_value"]').val(data.model.integer_value);
        DataPoint.Modal.form.find('[name="decimal_value"]').val(data.model.decimal_value);
    },

    update : function(data) {
        var integerValue = (data.model.integer_value !== undefined && data.model.integer_value !== null) ?
            data.model.integer_value : "";
        var decimalValue = (data.model.decimal_value !== undefined && data.model.decimal_value !== null) ?
            data.model.decimal_value : "";

        var row = DataPoint.Modal.tableBody.find('[data-row-id="' + data.model.id + '"]');
        row.find('.metric-name').html(data.model.metric.name);
        row.find('.date-value').html(data.model.date_value);
        row.find('.integer-value').html(integerValue);
        row.find('.decimal-value').html(decimalValue);
    },

    destroy : function(data) {
    }
};


$(function() {
    DataPoint.initialize();
});
