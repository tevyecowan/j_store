<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>J-Store Online Geniza</title>
    <meta name="description" content="J-Store Online Geniza">
    <meta name="author" content="Tevye Cowan">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/styles.css" type="text/css" media="screen" />
</head>

<body>

<!-- 					HEADER					-->

<?php
include('../includes/header.php');
include('../includes/mysqli_connect.php');
?>

<!-- 					MENU, CONTENT					-->
<div id="content">
    <?php
    if (isset($_POST['filename'])) {

    $filename = $_POST['filename'];
    $data  = $_POST['data'];

    $query = "insert into uploads (data, filename)
    values('$filename', '$data');";

    if (mysqli_query ($dbc, $query)){
    //echo "Successfully inserted into Product table<br>";
    echo "<br>Congrats! You have successfully added your new document.<br>";
    }else{
    //	echo "ERROR: Could not able to execute $query. " . mysqli_error($dbc) . "<br>";
    }

    }else{    //if user somehow got to this page without submitting the form
    echo  "<h4>Please enter your new product into the form below</h4>";
    }

    mysqli_close($dbc);
    ?>
</div>
<br><br>

<form name="documentForm" action="addDocument.php" method="POST" enctype="multipart/form-data">
    File:  <input type="file" name="data"/><br>
    Document name: <input type='text' name='filename'><br>
        <input type="submit" name="submit" value="Upload"/>
</form>

<?php

if (isset($_POST['submit']))
	{
		$error_code = $_FILES['data']['error'];
		if ($error_code) { $list_error = array (1 => 'File size exceeds the maximum allowed',
												2 => 'File size exceeds the maximum allowed',
												3 => ' File only partially uploaded ',
												4 => ' No file was uploaded',
												6 => 'Temporary folder not found',
												7 => 'Failed to write file to disk'
											);

echo 'ERROR: ' . $list_error[$_FILES['data']['error']];
 } else {

if (is_uploaded_file($_FILES['data']['tmp_name'])) {

	// VALIDATION
	$size = $_FILES['data']['size'];
	$type = $_FILES['data']['type'];
	$mime = array('image/jpeg', 'image/jpg');
	$error = false;

	if ($size > (1024 * 1024)) { // 1 MB
		$error = 'ERROR: Maximum size allowed is 1 MB';
	}
	elseif (!in_array($type, $mime)) {
		$error = 'ERROR: File type must be JPG or JPEG';
	}

	// UPLOAD
	else {
		$tmp_name = $_FILES['data']['tmp_name'];
		$new_file = 'files/'.$_FILES['data']['name'];
		if( move_uploaded_file($tmp_name, $new_file) ){
			echo 'File successfully uploaded';
			} else {
				$error = 'File cannot be uploaded, please try again later';
				}
				}
				// IF ERROR
				if ($error) {
					echo $error;
				}
			} else {
				echo 'No file uploaded';
			}
		}
	}
?>

<!--
<form name='documentForm' action="addDocument.php" method="POST" >
    Document image: <input type='file' name='image'><br>

    Document name: <input type='text' name='name'><br>

    Description: <input type='textarea' name='description'><br>

    File: <input type='file' name='file'><br>

    <input type='submit' name='submit'><br>

</form>-->
</div>
<!-- 					SCRIPTS					-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="includes/pets4u.js"></script>-->
</body>
</html>
