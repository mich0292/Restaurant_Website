<?php
	if ( isset($_POST['uploadPic']) ){
		$file = $_FILES['menuPic'];
		print_r($_FILES);
		//Extract information from the file 
		$fileName = $file['name'];	//Associative array
		//or $_FILES['menuPic']['name]
		$fileType = $file['type'];
		$fileTmp = $file['tmp_name'];
		$fileError = $file['error']; //0 -> no error; 1 -> error
		$fileSize = $file['size']; 
		
		//Check file types
		//Separate fileName & fileExt
		$fileExt = explode('.', $fileName);
		//Explode creates an array 
		$fileActualExt = strtolower($fileExt[1]);
		
		$allowedExt = array("jpg", "jpeg", "png");
		
		//Check if the file type is allowed, no error (+ file size if needed)
		if ( in_array($fileActualExt, $allowedExt) && $fileError === 0 ){
			$fileDestination = 'images/menu/'.$fileName;
			//uploads the tmp file to the destination
			move_uploaded_file($fileTmp, $fileDestination);
			$_SESSION['picURL'] = $fileDestination;
			header("Location: Admin-MenuList.php?upload=success");
			exit();
		} else {
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-MenuList.php?error=uploadFailed");
           exit();
		}
	}
?>