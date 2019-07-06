$(document).ready(function() {
    $('input[name=fileToUpload]').change(function(ev) {
        alert("selected");

        $('#add').append('<p>Selected file is: ' + $('#fileToUpload') + '.</p>');
    });
});