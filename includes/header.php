<?php
	session_start();
	$success = false;
	$GLOBALS['a'] = 'success';
?>
<!-- 					NAV					-->
<div id="header" class="textContainer cover-container d-flex p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h1 class="masthead-brand">JStore</h1>
            <nav id="navbar" class="nav nav-masthead justify-content-center">
				<ul class="nav nav-pills">
					<li class="nav-item">
					<a class="nav-link active" id="indexPg" href="index.php">Home</a>
					<li class="nav-item">
					<a class="nav-link" id="aboutPg" href="about.php">About</a>
					<li class="nav-item">
					<a class="nav-link" id="archivePg" href="archive.php">Archive</a>
				</ul>
            </nav>
        </div>
    </header>
</div>