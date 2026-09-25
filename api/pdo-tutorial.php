<?php

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'names';

	// Set DSN
	$dsn = 'mysql:host=' . $host . ';dbname='. $dbname;

	// Create PDO instance
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

	# PDO QUERY

	// $stmt = $pdo->query('SELECT * FROM ids');

	// while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	// 	echo $row['name']. '<br>';
	// }

	// while($row = $stmt->fetch()){
	// 	echo $row->name . '<br>';
	// }

	# PREPARED STATEMENTS (prepare & execute)

	// UNSAFE:
	// $sql = "SELECT * FROM names WHERE id = '$id'";
	// ^Bad because the $id can be inputted by the user, and they could insert SQL code into your command through this. Prepared statements separate the input from the code.

	// FETCH

	//Prepare the SQL template:
	$sql = 'SELECT * FROM ids WHERE gender = :gender';
	$stmt = $pdo->prepare($sql);

	//Execute by passing values
	$gender = 'm';
	$stmt->execute(['gender' => $gender]);

	// Fetch the results
	$ppl = $stmt->fetchAll();

	// var_dump($ppl);

	foreach($ppl as $person){
		echo $person->name . '<br>';
	}


























?>