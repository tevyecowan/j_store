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
<div id="menu">
    <div id="archivePg" style="display: block">
        <div id="searchMenuAndBorder">
            <div id="innerWindow">

                <?php
                include ('includes/mysqli_connect.php');
                $query = "select distinct filename, description
						from uploads
						;";

                //echo $query . "<br>";

				//prints list of files (currently in cards)
                $result = mysqli_query ($dbc, $query);
                echo "<div class=\"container\"><div class=\"row\">";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class=\"card col-lg-3 col-sm-6\">";
                    echo  "<div class=\"card-body\"><h5 class=\"card-title\">" .  $row['filename']  . "</p><br>";
                    echo "<br><br><div class=\"description\">".$row['description']."</div></div>";
                    echo "</div>";
                }
                echo "</div></div>";

                mysqli_close($dbc);
                ?>
            </div>
        </div>
    </div>
</div>

</div>

<!-- 					SCRIPTS					-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>