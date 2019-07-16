<?php
	session_start();
	$success = false;
	$GLOBALS['a'] = 'success';
?>
<!-- 					NAV					-->
<div id="header" class="cover-container d-flex p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h1 class="masthead-brand">JStore</h1>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link" id="indexPg" href="index.php">Home</a>
                <a class="nav-link" id="aboutPg" href="about.php">About</a>
                <a class="nav-link" id="archivePg" href="archive.php">Archive</a>
            </nav>
        </div>
    </header>
</div>