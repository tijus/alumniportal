	
<?php
$document_root=$_SERVER['DOCUMENT_ROOT'];
	define ("MAX_SIZE","1000"); 
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	$errors=0;
	$image=$_FILES['file']['name'];
	if ($image) 
	{
		$filename = stripslashes($_FILES['file']['name']);
		$extension = getExtension($filename);
		$extension = strtolower($extension);
		if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") 
			&& ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") 
			&& ($extension != "PNG") && ($extension != "GIF")) 
		{
			echo '<h3>Unknown extension!</h3>';
			$errors=1;
		}
		else
		{
			$size=filesize($_FILES['file']['tmp_name']);
		
			if ($size > MAX_SIZE*1024)
			{
				echo '<h4>You have exceeded the size limit!</h4>';
				$errors=1;
			}
		
			$image_name=$filename.'.'.$extension;
			$newname=$document_root."/portal/frontend/uploads/".$image_name;
			 
			$copied = copy($_FILES['file']['tmp_name'], $newname);
			if (!$copied) 
			{
				echo '<h3>Copy unsuccessfull!</h3>';
				$errors=1;
			}
			else header("Location:portal/frontend/web/index.php?r=form/view-profile&id=19");
			
			
		}
	}

            include($document_root."/portal/common/config/config.php");
		$sql = "UPDATE basic_info SET profile_pic_path='$newname' WHERE basic_info_id=19";
		echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();


		