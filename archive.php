<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>JStore Archive</title>
    <meta name="description" content="JStore Online Geniza">
    <meta name="author" content="Tevye Cowan">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="includes/styles.css" type="text/css" media="screen" />
</head>

<body>

<!-- 					HEADER					-->
	<?php

		$returnPage = "addDocument";
		$_SESSION['returnPage'] = $returnPage;

	?>

    <!-- 					NAV					-->
    <div id="header" class="textContainer cover-container d-flex p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h1 class="masthead-brand">JStore</h1>
                <nav id="navbar" class="nav nav-masthead justify-content-center">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link" id="indexPg" href="index.php">Home</a>
                        <li class="nav-item">
                            <a class="nav-link" id="aboutPg" href="about.php">About</a>
                        <li class="nav-item">
                            <a class="nav-link active" id="archivePg" href="archive.php">Archive</a>
                    </ul>
                </nav>
            </div>
        </header>
    </div>


<!-- 					MENU, CONTENT					-->
	<div id="list">

		<?php
			include ('includes/mysqli_connect.php');

			//queries distinct items from database
			$query = "select distinct filename, description
					from uploads
					;";

			//prints list of files
			$result = mysqli_query ($dbc, $query);
			echo "<div class=\"list-group\">";
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<a href=\"#\" class=\"list-group-item list-group-item-action flex-column align-items-start\">";
				echo  "<h5 class=\"mb-1\">" .  $row['filename']  . "</h5>";
				echo "<p class=\"mb-1\">".$row['description']."</p>";
				echo "</a>";
			}
			echo "</div>";

			mysqli_close($dbc);
		?>
	</div>


<!-- 					SCRIPTS					-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>