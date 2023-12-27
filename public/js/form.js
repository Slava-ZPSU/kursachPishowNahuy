$(document).ready(function() {
    $('form').submit(function(event) {
        event.preventDefault();

        var json;

        var formData =  new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: formData,
            contentType: false,
            cache: false,
            processData: false,

            success: function(result) {
                try {
                    json = jQuery.parseJSON(result);
                    if (json.url) {
                        window.location.href = '/' + json.url;
                    } else {
                        alert(json.status + ' - ' + json.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON: ', e);
                    // Обробка помилки при парсінгу JSON
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX request failed: ', status, error);
                // Обробка помилок AJAX
            }
        });
    });
});
