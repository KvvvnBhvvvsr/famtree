<?php
	echo "Hello, World!<br>";
	echo "This is Kevin's initial PHP tutorial scrapyard.";
?>

<br><br>

<?php
	$fam_members = [1,2,3];

	function registerUser($user) {
		echo "$user registered.<br><br>";
	}

	registerUser("Benjmain");

	var_dump(json_encode($fam_members));
?>

<br><br>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<li>Host: <?php echo $_SERVER['HTTP_HOST']; ?></li>
	<li>Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></li>
	<li>Server Name: <?php echo $_SERVER['SERVER_NAME']; ?></li>
	<li>Current File Dir: <?php echo $_SERVER['PHP_SELF']; ?></li>
	<li>Request URI: <?php echo $_SERVER['REQEST_URI']; ?></li>
	<li>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
	<li>Client Info: <?php echo $_SERVER['HTTP_USER_AGENT']; ?></li>
	<li>Remote Address: <?php echo $_SERVER['REMOTE_ADDR']; ?></li>
	<li>Remote Port: <?php echo $_SERVER['REMOTE_PORT']; ?></li>
	<br><br>
 </html>


<?php

	// echo $_GET['name'];
	// echo $_GET['age'];

	if(isset($_POST['submit'])) {
		echo $_POST['name'];
		echo $_POST['age'];
	}

?>

<a href="<?php echo $_SERVER['PHP_SELF']; ?>?name=Benjmain&age=23">Click</a>

<br><br>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
	<div>
		<label for="name">Name: </label>
		<input type="text" name="name">
	</div>
	<div>
		<label for="age">Age: </label>
		<input type="text" name="age">
	</div>
	<input type="submit" value="Submit" name="submit">
</form>







