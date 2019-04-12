<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>J-Store Online Geniza</title>
    <meta name="description" content="J-Store Online Geniza">
    <meta name="author" content="Tevye Cowan">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../includes/styles.css" type="text/css" media="screen" />
</head>

<body>

<!-- 					HEADER					-->

<?php
include('../includes/header.php');

?>

<!-- 					MENU, CONTENT					-->
<div id="content">

    <?php

    include('../includes/mysqli_connect.php');

    if (isset($_POST['image'])) {
        $p_file_name = $_POST['image']['name'];
        $p_file_size = $_POST['image']['size'];
        $p_file_tmp = $_POST['image']['tmp_name'];
        $p_file_type = $_POST['image']['type'];

        $query = "insert into uploads (filename, filesize, filetype)
    values('$p_file_name', '$p_file_size', '$p_file_type');";

        if (mysqli_query ($dbc, $query)){
            echo "<br>Congrats! You have successfully added your new document.<br>";
        }else{
            	echo "ERROR: Could not able to execute $query. " . mysqli_error($dbc) . "<br>";
        }

        $_POST = array();

    }else{    //if user somehow got to this page without submitting the form
        echo  "<h4>Please enter your new product into the form below</h4>";
    }

    if(isset($_FILES['image'])){
        $errors= array();
        $f_file_name = $_FILES['image']['name'];
        $f_file_size = $_FILES['image']['size'];
        $f_file_tmp = $_FILES['image']['tmp_name'];
        $f_file_type = $_FILES['image']['type'];
        //$file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));

        //$extensions= array("jpeg","jpg","png");

       // if(in_array($file_ext,$extensions)=== false){
        //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
       // }

        if($f_file_size > 2097152) {
            $errors[]='File size must be exactly 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($f_file_tmp,"images/".$f_file_name);
            echo "Success";
        }else{
            print_r($errors);
        }
    }
    mysqli_close($dbc);
    ?>

    <form action = "addDocument.php" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "image" />
        <input type = "submit" name="submit" />

        <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
        </ul>

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
