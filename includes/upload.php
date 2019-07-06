
    <?php
    //$returnPage = "addDocument";
    //$_SESSION['returnPage'] = $returnPage;
    include('mysqli_connect.php');

	//assigns variables to name, size, type, description, and a temp name
    if(isset($_POST['submit'])){
        $errors= array();
        $f_file_name = $_FILES['fileToUpload']['name'];
        $f_file_size = $_FILES['fileToUpload']['size'];
        $f_file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $f_file_type = $_FILES['fileToUpload']['type'];
        $f_file_description = $_POST["description"];

		//checks file extension
        $tmp = explode('.', $_FILES['fileToUpload']['name']);
        $file_ext = strtolower(end($tmp));
        $extensions= array("jpeg","jpg","png", "pdf", "doc");
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="At this time we can only accept .jpeg, .jpg, .png, .pdf or .doc files.";
        }
		
		//check file size
        if($f_file_size > 2097152) {
            $errors[]='File size must be exactly 2 MB';
        }

		//if no errors, copies file into uploads folder.
        define('SITE_ROOT', 'includes/uploads');
        if(empty($errors)==true) {
            move_uploaded_file($f_file_tmp,SITE_ROOT."/".$f_file_name);
            $file_path = SITE_ROOT."/".$f_file_name;
            //$file_info = new finfo(FILEINFO_MIME);
            //$mime_type = $file_info->buffer(file_get_contents($file_info));
            echo "<h4>Your file was added to the uploads folder.</h4>";
        }else{
            print_r($errors);
        }
		
		//inserts file values into database
        $query = "insert into uploads (filename, filesize, description)
    values('$f_file_name', '$f_file_size', '$f_file_description');";
        if (mysqli_query ($dbc, $query)){
            echo "<br><h4>Your file info was added to the database.</h4><br>";
            //echo $mime_type;
        }else{
            echo "<h4>ERROR: Could not execute $query. " . mysqli_error($dbc) . "</h4><br>";
        }

		
		//checks if uploaded both into database and upload folder
        if ((empty($errors)==true) && (mysqli_query ($dbc, $query))){
            $GLOBALS['a'] = true;
            echo "<br><h4>success</h4><br>";
        }
        else{$GLOBALS['a'] = false;}

        $_POST = array();
    }
        else{    //if user somehow got to this page without submitting the form
            echo  "<h4>Please enter your new product into the form below</h4>";
    }
    mysqli_close($dbc);
    ?>
