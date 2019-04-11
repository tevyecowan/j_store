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
<div id="header">

    <h1 style="text-align: center;">J-Store Online Geniza</h1>

</div>
<?php
include('includes/mysqli_connect.php');
?>

<!-- 					NAV					-->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
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
