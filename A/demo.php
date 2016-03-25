

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>jQuery Super Treadmill Demo</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="super-treadmill.css" />
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <style>
        body { font-family:'Open Sans'; background-color:#434A53; color:#fff;}
        #container { max-width:640px; margin:150px auto;}
        </style>
	</head>
	<body>
		<div id="container">
		<div id="mytreadmill" class="treadmill">
		<?php
		include("config.php");
		$sql = "SELECT * FROM Notifications";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    	?>
    

			
				<div class="treadmill-unit">
					<h2><?php echo $row["Title"];?></h2>
					<p><?php echo $row["Description"];?></p>
				</div>
		
				<?php
				}
}else {
    echo "No Notifications";
}
$conn->close();?>
			</div><br>
<br>
<br>

			<button id="stop">Stop</button>
		</div>

		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="super-treadmill.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#mytreadmill').startTreadmill({
					runAfterPageLoad: true,
            				direction: "down",
            				speed: "medium",
            				viewable: 3,
            				pause: false
				});
			});
		</script>

	</body>
</html>
