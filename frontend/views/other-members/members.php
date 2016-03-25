
<u><h1>Current Portal Members</h1></u>
<br><br>
<?php  
 //use frontend\assets\AppAsset;
//AppAsset::register($this);
  $this->registerJsFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js',['position' => \yii\web\View::POS_HEAD]);
  $this->registerJsFile('http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js',['position' => \yii\web\View::POS_HEAD]);
    $this->registerJsFile(Yii::$app->request->baseUrl.'/js/datatables.js',['position' => \yii\web\View::POS_HEAD]);
   $this->registerCssFile('http://cdn.datatables.net/1.10.5/css/jquery.dataTables.css');
// echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>';
//echo '<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>';
  //   echo '<script src="http://cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js" type="text/javascript"></script>';
//     echo "<script>
//$(document).ready(function() {
//    $('#example').DataTable();
//} );
//</script>";
    //echo '<link rel="stylesheet" href="http://cdn.datatables.net/1.10.5/css/jquery.dataTables.css" type="text/css">';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT basic_info.* FROM basic_info";
$result = $conn->query($sql);

if (($result->num_rows >1)) {
 
    echo '<table id="example" class="display" cellspacing="0" width="100%"><thead><tr><th>Full Name</th><th>Batch</th><th>Status</th></tr></thead>';
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["first_name"]." ".$row["last_name"]."</td><td>".$row["batch"]."</td><td>".$row["status"]."</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Something error displaying result as zero";
}
$conn->close();

?>





