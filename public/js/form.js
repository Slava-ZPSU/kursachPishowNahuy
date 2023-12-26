$(document).ready(function() {
    $('form').on( 'submit', function(event) {
        if ($(this).attr('id') === 'no_ajax') {
            return;
        }

        var json;
        event.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,

            success: function(result) {
                try {
                    json = $.parseJSON(result);
                    if (json.url) {
                        window.location.href = '/' + json.url;
                    } else {
                        alert(json.status + ' - ' + json.message);
                    }
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    // Handle the error appropriately, e.g., show an alert or log it
                }
            },
        });
    });
});