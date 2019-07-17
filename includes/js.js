$(document).ready(function() {

	$(#indexPg).click(function () {
		$("#indexPg").attr("class", "nav-pills active");
		$("#aboutPg").attr("class", "nav-pills");
		$("#archivePg").attr("class", "nav-pills");
	});
	$(#aboutPg).click(function () {
		$("#aboutPg").attr("class", "nav-pills active");
		$("#indexPg").attr("class", "nav-pills");
		$("#archivePg").attr("class", "nav-pills");
	});
	$(#archivePg).click(function () {
		$("#archivePg").attr("class", "nav-pills active");
		$("#aboutPg").attr("class", "nav-pills");
		$("#indexPg").attr("class", "nav-pills");
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