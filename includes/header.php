<?php
session_start();
$success = false;
$GLOBALS['a'] = 'success';

?>
<div id="header">

    <h1 style="text-align: center;">J-Store Online Geniza</h1>

</div>


<!-- 					NAV					-->
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="home" class="nav-link" href="#" onclick="location.reload();location.href='main.php'">Home </a>
            </li>
            <li class="nav-item">
                <a id="addDocument" class="nav-link" href="#"onclick="location.reload();location.href='addDocument.php'">Add Document</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
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