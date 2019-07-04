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
        <form id="searchForm" action="archive.php" method="post">
            Search: <input type="text" name="search"><br><br>
            <?php

            include ('includes/mysqli_connect.php');

            $query = "select * 
						from Category 
						order by category_id;";

            $result = mysqli_query ($dbc, $query);
            echo "<label><b>Narrow results by Category:</b></label><br>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<input type=\"checkbox\" name=\"category[]\" value=\"" . $row['category_id'] . "\">" . $row['category_name'] . "</option><br>";
            }
 
            echo "<label><b>Order results by:</b></label><br>";
            echo "<input type=\"radio\" name=\"orderBy\" value=\"c.category_id\">Category</input><br>";
            echo "<input type=\"radio\" name=\"orderBy\" value=\"p.product_name\">Name</input><br>";
            echo "<input type=\"radio\" name=\"orderBy\" value=\"p.price\">Price</input><br>";

            ?>
            <br> <label><input  type="submit" style="display:none;"> Search </label><br>
            <?php
            if (isset($_SESSION['loginName']) && $_SESSION["is_admin"] == "1") {
                echo "<div id=\"cataAdd\">";
                echo "<button type=\"button\" id=\"addProdBtn\"; background-color: #FEF497; color: #5228B3;\" onclick=\"window.location.href='addProduct.php?returnPage=".$returnPage."'\">Add Product</button>";
                echo "</div>";
            }
            ?>
        </form>
        <div id="searchMenuAndBorder">
            <div id="innerWindow">

                <?php

                //Text boxes return an empty string instead of null when empty
                //This sets search to null if empty
                if (isset($_POST["search"]) && $_POST["search"] != ''){
                    $_SESSION['search'] = "'%".$_POST['search']."%'";
                    $search = $_SESSION['search'];
                }

                if (isset($_POST["category"])){
                    $_SESSION['category'] = $_POST['category'];
                    $category = $_SESSION['category'];
                }

                if (isset($_POST["orderBy"])){
                    $_SESSION['orderBy'] = $_POST['orderBy'];
                    $orderBy = $_SESSION['orderBy'];
                }
                $query = "select distinct p.product_id, p.price, p.image, p.product_name, p.description, c.category_id
						from Product p, product_category c
						where p.product_id = c.product_id ";


                //this sections adds appropate code to the search for each set value
                if ($search != null){
                    $query .= " and upper(p.product_name) like upper($search)";
                }

                if ($category != null){
                    $query .= " and c.category_id in (" . implode("," ,$category) . ")";
                }

                if ($orderBy != null){
                    $query .= " order by $orderBy";
                }

                $query .= ";";

                //echo $query . "<br>";

                $result = mysqli_query ($dbc, $query);
                echo "<div class=\"container\"><div class=\"row\">";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class=\"card col-lg-3 col-sm-6\">";
                    echo  "<div class=\"card-body\"><h5 class=\"card-title\">" .  $row['product_name']  . "</h5><p class=\"card-text\"> $" . $row['price']  . "</p><br>";
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