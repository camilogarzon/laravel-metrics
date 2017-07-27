
var Api = {
    initialize: function() {
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
            headers: { 'X-CSRF-TOKEN': window.csrfToken },
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
