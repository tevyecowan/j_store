
    <?php
	
	//TODO: check file types more thoroughly
	
	/*
	advice:
	http://www.scanit.be/uploads/php-file-upload.pdf

	To summarize the suggestions in this article:
	- it is important to validate the file extension, though this is not enough by itself
	- malicious scripts can be hidden even within image files and servers can be modified to run a jpeg file through php

	The suggestions for a more secure file uploading are:
	1. Store uploaded files either outside web root or if under web root, in a directory to which direct access is denied. (in apache via .htaccess) 

	2. Change the file name to something randomly system generated and store the user file name and the real file name in a database table.

	3. If users are to be allowed to view the file, have them access it through a script that gets the file through this table and display it in such a way that it can only be viewed and not executed.

	Also, to prevent denial of service attacks, you should impose limits on the number of files a user can upload in a 24 hour period as well as limiting the file sizes.

	There are examples of how to do this in the link.

	*/
	
	
	
	
	/*
	example from https://www.php.net/manual/en/features.file-upload.php:
	
	try {
    
    // Undefined | Multiple Files | $_FILES Corruption Attack
    // If this request falls under any of them, treat it invalid.
    if (
        !isset($_FILES['upfile']['error']) ||
        is_array($_FILES['upfile']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    // Check $_FILES['upfile']['error'] value.
    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    // You should also check filesize here. 
    if ($_FILES['upfile']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }

    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['upfile']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }

    // You should name it uniquely.
    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.
    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('./uploads/%s.%s',
            sha1_file($_FILES['upfile']['tmp_name']),
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    echo $e->getMessage();

}


*/
	
	
	
	
	
		
		//$_SESSION['returnPage'] = $returnPage;
		include('mysqli_connect.php');
		$f_file_name = $_FILES['fileToUpload']['name'];
		$f_file_size = $_FILES['fileToUpload']['size'];
		$f_file_tmp = $_FILES['fileToUpload']['tmp_name'];
		$f_file_type = $_FILES['fileToUpload']['type'];
		$f_file_description = $_POST["description"];
		//assigns variables to name, size, type, description, and a temp name
		if(isset($_POST['submit'])){
			$errors= array();

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
				echo "<h4>Your file " . $f_file_name . " was added to the uploads folder.</h4>";
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
			
			//TODO: add print item number upon successful add
			
			
			else{$GLOBALS['a'] = false;} //success variable

			$_POST = array();
		}
		  
		mysqli_close($dbc);
    ?>
