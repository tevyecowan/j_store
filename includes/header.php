<?php
	session_start();
	$success = false;
	$GLOBALS['a'] = 'success';

echo '<script type="text/javascript">	$(\'#indexPg\').click(function () {
		$(\'#indexPg\').attr("class", "nav-link active");
		$(\'#aboutPg\').attr("class", "nav-link");
		$(\'#archivePg\').attr("class", "nav-link");
	});
	$(\'#aboutPg\').click(function () {
		$(\'#aboutPg\').attr("class", "nav-link active");
		$(\'#indexPg\').attr("class", "nav-link");
		$(\'#archivePg\').attr("class", "nav-link");
	});
	$(\'#archivePg\').click(function () {
		$(\'#archivePg\').attr("class", "nav-link active");
		$(\'#aboutPg\').attr("class", "nav-link");
		$(\'#indexPg\').attr("class", "nav-link");
	});</script>';
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
					<a class="nav-link" id="archivePg" href="archive.php">Archive</a>
				</ul>
            </nav>
        </div>
    </header>
</div>