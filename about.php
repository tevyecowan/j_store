<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>JStore About</title>
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
                            <a class="nav-link active" id="aboutPg" href="about.php">About</a>
                        <li class="nav-item">
                            <a class="nav-link" id="archivePg" href="archive.php">Archive</a>
                    </ul>
                </nav>
            </div>
        </header>
    </div>


	<!-- 					MENU, CONTENT					-->

	<main id="intro" role="main" class="textContainer inner cover">
		<h2 style="text-align:center">What does JStore mean?</h2>
		<p class="lead">
			The name JStore originated as a joke, a riff on popular academic journal archive JStor: "What do you call an online geniza? JStore."
			The name also pokes fun at the desperate-seeming attempts of Jewish organizations and companies to appear hip and youthful,
			by adopting cutesy names like JSwipe and JDate.
		</p>
		<br>
		<h2 style="text-align:center">What's a geniza?</h2>
		<p class="lead">
			A geniza is a temporary storage place for holy documents and texts, items that contain Hashem's name
			before they are given a proper burial. Because they contain the name of Hashem, these items cannot be
			disposed of like other, regular items. They must be treated with respect and buried when they are no
			longer of use.
		</p>
		<br>
		<h2 style="text-align:center">Why does this exist?</h2>
		<p class="lead">
			The concept for an online geniza came from conversations with online communities of Jews following
			the Jewish tradition of asking religious questions based on the changing world around us.
			While our texts may remain static, our lives don't. For many of us, most of our documents, even including
			books, are hosted online... But even though our texts have become digitized, we should still be able
			to dispose of them in a halakhically permissable way. Because of the nature of data - that it can only be copied, not truly transferred, 
			creating a "proper" geniza for digital documents is problematic. Even if one were to upload their documents
			into an online archive like JStore, they will still need to delete the original copy. It is my intention with this project
			to offer an alternative, however problematic, to traditions that may no longer suit our needs, and hopefully inspire others
			to do the same.
		</p>
		<br>
		<h2 style="text-align:center">How does this exist?</h2>
		<p class="lead">
			This site was created using PHP and JS/JQuery. I have based much of the functionality for JStore
			off my year-end project at Camosun College's ICS certificate program, which was to create a fully functional e-commerce
			site. I have used the creation of JStore as a way to solidify and put into practice what I have learned at school. How wonderful
			it is to finally have the skills to bring to life the ideas I have been floating around for years!
		</p>
		<br>
	</main>

<!-- 					SCRIPTS					-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>