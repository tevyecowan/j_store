$(document).ready(function() {

	$(#indexPg).click(function () {
		
	});



    $('#browse').change(function(ev) {

       $('#add').empty();
       var fullFileName =  $('#browse').val();
       var length = fullFileName.length;
       var index = fullFileName.indexOf("fake");
       var fileName = fullFileName.substring(length,index+9);
       var sentence = 'Selected file is: ' + fileName + '.';

       $('#add').append(sentence);

    });

});