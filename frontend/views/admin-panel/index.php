


    
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
 require($_SERVER['DOCUMENT_ROOT']. '/portal/common/config/config.php');

$sql = "SELECT user.*, basic_info.*, educational_details.*, 
                   projects.*, technical_proficiency.*,work_experience.*
FROM user
LEFT JOIN (SELECT *
      FROM basic_info
      GROUP BY basic_info_id) basic_info
ON basic_info.basic_info_id = user.id
LEFT JOIN (SELECT *
      FROM educational_details
      GROUP BY edu_det_id) educational_details
ON educational_details.edu_det_id = user.id
LEFT JOIN (SELECT *
      FROM projects
      GROUP BY proj_id) projects
ON projects.proj_id = user.id
LEFT JOIN (SELECT *
      FROM technical_proficiency
      GROUP BY tech_prof_id) technical_proficiency
ON technical_proficiency.tech_prof_id = user.id
LEFT JOIN (SELECT *
      FROM work_experience
      GROUP BY work_exp_id) work_experience
ON work_experience.work_exp_id = user.id ";
$result = $conn->query($sql);

if ($result->num_rows >1) {
 
    echo '<table id="example" class="display" cellspacing="0" width="5%"><thead><tr><th>id</th><th>Username</th><th>Authentication key</th><th>hashed password</th><th>Password Reset Token</th><th>email</th><th>status</th><th>Created at</th><th>Updated at</th><th>basic_info_id</th><th>First Name</th><th>Last Name</th><th>DOB</th><th>gender</th><th>country</th><th>Mobile</th><th>Corresponding Address</th><th>Permanent Address</th><th>Website</th><th>Hobbies</th><th>Marital Status</th><th>Status</th><th>First login date</th><th>last profile update date</th><th>edu_det_id</th><th>degree</th><th>grade</th><th>Stream</th><th>board</th><th>proj_id</th><th>title</th><th>year</th><th>domain</th><th>description</th><th>tech_prof_id</th><th>skill</th><th>level</th><th>work_exp_id</th><th>type</th><th>company_name</th><th>job title</th><th>start date</th></tr></thead>';
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["auth_key"]."</td><td>".$row["password_hash"]."</td><td>".$row["password_reset_token"]."</td><td>".$row["email"]."</td><td>".$row["status"]."</td><td>".$row["created_at"]."</td><td>".$row["updated_at"]."</td><td>".$row["basic_info_id"]."</td><td>".$row["first_name"]."</td><td>".$row["last_name"]."</td><td>".$row["DOB"]."</td><td>".$row["gender"]."</td><td>".$row["country"]."</td><td>".$row["mobile_no"]."</td><td>".$row["corr_address"]."</td><td>".$row["permanent_address"]."</td><td>".$row["website"]."</td><td>".$row["hobbies"]."</td><td>".$row["marital_status"]."</td><td>".$row["status"]."</td><td>".$row["first_login_date"]."</td><td>".$row["last_profile_update_date"]."</td><td>".$row["edu_det_id"]."</td><td>".$row["degree"]."</td><td>".$row["grade"]."</td><td>".$row["stream"]."</td><td>".$row["board"]."</td><td>".$row["proj_id"]."</td><td>".$row["title"]."</td><td>".$row["year"]."</td><td>".$row["domain"]."</td><td>".$row["description"]."</td><td>".$row["tech_prof_id"]."</td><td>".$row["skill"]."</td><td>".$row["level"]."</td><td>".$row["work_exp_id"]."</td><td>".$row["type"]."</td><td>".$row["company_name"]."</td><td>".$row["job_title"]."</td><td>".$row["start_date"]."</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Something error displaying result as zero";
}
$conn->close();

?>





