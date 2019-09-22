<?php
ini_set('upload_max_filesize', '10000M');
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_FILES["file"])) {
	//var_dump($_FILES);
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if (copy($_FILES["file"]["tmp_name"], $target_file)) {
		$return['file']='uploads/'.basename( $_FILES["file"]["name"]);
		$return['name']=basename( $_FILES["file"]["name"]);
		echo json_encode($return);
        //echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	
}else{
	echo 'can not use method get and lost input uploads';
}

?>