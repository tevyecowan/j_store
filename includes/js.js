$(document).ready(function() {

	$(#indexPg).click(function () {
		$("#indexPg").attr("class", "nav-link active");
		$("#aboutPg").attr("class", "nav-link");
		$("#archivePg").attr("class", "nav-link");
	});
	$(#aboutPg).click(function () {
		$("#aboutPg").attr("class", "nav-link active");
		$("#indexPg").attr("class", "nav-link");
		$("#archivePg").attr("class", "nav-link");
	});
	$(#archivePg).click(function () {
		$("#archivePg").attr("class", "nav-link active");
		$("#aboutPg").attr("class", "nav-link");
		$("#indexPg").attr("class", "nav-link");
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