function displayImage(input) {
    var file = input.files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = document.getElementById('selected-image');
            img.hidden = '';
            img.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        // Handle the case where no file is selected
        document.getElementById('selected-image').src = '';
    }
}