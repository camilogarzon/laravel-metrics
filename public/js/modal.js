
var Modal = {
    modal : null,
    form : null,
    tableBody : null,
    modelId : null,
    attributes : null,

    initialize: function( attributes ) {
        this.attributes = attributes;
        this.modal = $('#' + attributes.modalId);
        this.tableBody = $('#'+attributes.tableBodyId);
        this.form = this.modal.find('form');
        this.modelId = this.form.find('[name="id"]');

        this.modal.find('.btn-close').click(Modal.clearForm);
        this.modal.find('.btn-save').click(Modal.save);

        this.tableBody.find('[data-edit-id]').click(Modal.edit);
        this.tableBody.find('[data-destroy-id]').click(Modal.destroy);
    },

    bindTableEvents : function(rowId) {
        Modal.tableBody.find('[data-edit-id="' + rowId + '"]').click(Modal.edit);
        Modal.tableBody.find('[data-destroy-id="' + rowId + '"]').click(Modal.destroy);
    },

    clearForm : function() {
        Modal.form.find('input').each(function(i, e){
            $(e).val('');
        });
        Modal.form.find('select').val('');
        Modal.modelId.val(0);
        Modal.modal.find('.modal-title').html('Create ' + Modal.attributes.modelName);
    },

    close : function() {
        Modal.modal.find('.btn-close').trigger('click');
        Modal.clearForm();
    },

    open : function(title) {
        $('[data-target="#' + Modal.attributes.modalId + '"]').trigger('click');
        Modal.modal.find('.modal-title').html(title);
    },

    save : function(event) {
        var objectId = Modal.modelId.val();
        // TODO: validate data
        var data = Modal.form.serialize();
        if (objectId > 0) {
            Api.ajax(data, Modal.attributes.ajaxUrl + '/' + objectId, 'put', Modal.update);
        } else {
            Api.ajax(data, Modal.attributes.ajaxUrl, 'post', Modal.store);
        }
        Modal.close();
    },

    store : function(data) {
        if (data.valid) {
            Modal.attributes.callback.store(data);
        }
    },

    edit : function(event) {
        var objectId = event.currentTarget.dataset.editId;
        Modal.modelId.val(objectId);
        if (objectId > 0) {
            Api.ajax(null, Modal.attributes.ajaxUrl + '/' + objectId + '/edit', 'get', Modal.attributes.callback.edit);
            Modal.open('Edit ' + Modal.attributes.modelName);
        }
    },

    update : function(data) {
        if (data.valid) {
            Modal.attributes.callback.update(data);
        }
    },

    destroy : function(event) {
        var objectId = event.currentTarget.dataset.destroyId;
        if ( window.confirm('You are going to delete record with ID = ' + objectId + '\n\nDo you want to continue?') ){
            Modal.tableBody.find('[data-row-id="' + objectId + '"]').remove();
            Api.ajax(null, Modal.attributes.ajaxUrl + '/' + objectId , 'delete', Modal.attributes.callback.destroy);
        }
    }

};
