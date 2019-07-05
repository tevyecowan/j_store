

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

$returnPage = "addDocument";
include('includes/header.php');
$_SESSION['returnPage'] = $returnPage;

?>


<!-- 					MENU, CONTENT					-->
<div id="content">

    <main id="intro" role="main" class="inner cover">
        <p class="lead">some intro text here</p>
        <p class="lead">
            <a href="#" class="btn btn-lg btn-secondary">Learn more</a>
        </p>
    </main>


<?php

/*if(!isset($_SESSION['s'])){
    $_SESSION['s'] = true;
};

if( !empty( $_POST ) && ($_SESSION['s']) )
{
    //your code
    $_SESSION['s'] = false;
}
*/

//checks if upload already submitted successfully
if(!empty($_POST)) {
    include('includes/upload.php');
    if ($GLOBALS['a'] == true) {
        echo "<h4>Thank you, your details have been submitted succesfully.</h4>";
    } // else show the form, either a clean one or with possible error messages
    else {
        echo "<h4>Oops! Something went wrong</h4>";
    }
}
?>
    <div id="container">
    <form action = "" method = "POST" enctype = "multipart/form-data">
        <label class="btn btn-md btn-secondary"> <input style="display: none;" type = "file" name ="fileToUpload"/> Browse File </label>
        <label class="btn btn-md btn-secondary"> <input type='textarea' name='description'> Description </label>
        <label class="btn btn-md btn-secondary"> <input style="display:none;" type = "submit" name="submit" /> Submit </label>


        <ul>
            <li>Sent file: <?php if(isset($_POST['submit'])){echo $_FILES['fileToUpload']['name']; } ?>
            <li>File size: <?php if(isset($_POST['submit'])){echo $_FILES['fileToUpload']['size']; } ?>
        </ul>

    </form>
    </div>


</div>
<!-- 					SCRIPTS					-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
