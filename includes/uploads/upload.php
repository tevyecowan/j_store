
    <?php


    if(isset($_POST['submit'])){
        $errors= array();
        $f_file_name = $_FILES['image']['name'];
        $f_file_size = $_FILES['image']['size'];
        $f_file_tmp = $_FILES['image']['tmp_name'];
        $f_file_type = $_FILES['image']['type'];
        //$file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));

        //$extensions= array("jpeg","jpg","png");

       // if(in_array($file_ext,$extensions)=== false){
        //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
       // }

        if($f_file_size > 2097152) {
            $errors[]='File size must be exactly 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($f_file_tmp,"includes/uploads/images/".$f_file_name);
            echo "Success";
        }else{
            print_r($errors);
        }
        $query = "insert into uploads (filename, filesize, filetype)
    values('$f_file_name', '$f_file_size', '$f_file_type');";

        if (mysqli_query ($dbc, $query)){
            echo "<br>Congrats! You have successfully added your new document.<br>";
        }else{
            echo "ERROR: Could not able to execute $query. " . mysqli_error($dbc) . "<br>";
        }

        $_POST = array();
    }
        else{    //if user somehow got to this page without submitting the form
            echo  "<h4>Please enter your new product into the form below</h4>";
    }
    mysqli_close($dbc);
    ?>
