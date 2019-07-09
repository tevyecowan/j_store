$(document).ready(function() {
    $('#browse').change(function(ev) {
       var fullFileName =  $('#browse').val();
       var length = fullFileName.length;
       var index = fullFileName.indexOf("fake");
       var fileName = fullFileName.substring(length,index+9);

        $('#add').append('Selected file is: ' + fileName + '.');
    });
});