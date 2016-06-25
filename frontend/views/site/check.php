<?php
require($_SERVER['DOCUMENT_ROOT']. '/portal/common/config/config.php');
/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);*/
// Check connection
echo $_GET["id"];
                
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$data=[];
$param = $_GET["id"];
if(strpos($param, '(Alumni)') !==false)
{
$detectedparam = str_replace("(Alumni)","",$param);	
}
else if(strpos($param, '(Student)') !==false)
{
	$detectedparam = str_replace("(Student)","",$param);	
}
else
{
	$detectedparam = $param;
}
$sql = "SELECT * FROM user where username='".$detectedparam."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	header("Location:/portal/frontend/web/index.php?r=form/view-profile&id=".$row['id']);
        exit;
        
    }
} else {
    echo "0 results";
}
$conn->close();

?>
