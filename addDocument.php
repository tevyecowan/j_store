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
include('includes/header.php');
?>

<!-- 					MENU, CONTENT					-->
<div id="content">
    <?php
    if (isset($_POST['name'])) {

    $image  = $_POST['image'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $file  = $_POST['file'];

    $query = "insert into document (document_name, description, image, file)
    values('$name', '$description', '$image', '$file');";

    if (mysqli_query ($dbc, $query)){
    //echo "Successfully inserted into Product table<br>";
    echo "<br>Congrats! You have successfully added your new product.<br>";
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

<form name='documentForm' action="addDocument.php" method="POST" >
    Document image: <input type='file' name='image'><br>

    Document name: <input type='text' name='name'><br>

    Description: <input type='textarea' name='description'><br>

    File: <input type='file' name='file'><br>

    <input type='submit' name='submit'><br>

</form>
</div>
<!-- 					SCRIPTS					-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--<script src="includes/pets4u.js"></script>-->
</body>
</html>
