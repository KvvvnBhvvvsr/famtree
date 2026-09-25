<?php
	echo "Hello, World!<br>";
	echo "This is where I will generate some dummy famtree data for testing.<br>";
	echo "092326: added insertDummy and createRel functions";
?>

<br><br>

<?php

	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'names';

	$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

	try {
		$pdo = new PDO($dsn, $user, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		die("Couldn't connect. " . $e->getMessage());
	}

	function insertDummy($dummyID, $dummyName = 'dum_test_', $dummyGender = 'm') {
		// TODO: Check for and Prevent duplicate rows

		global $pdo;
		$dummyName = $dummyName . $dummyID;
		$dummyGender = 'f';
		echo "Inserting Dummy: $dummyName, $dummyGender. \n";
		$insertDummySQL = 'INSERT INTO ids (name, gender) values (?, ?)';
		$stmt = $pdo->prepare($insertDummySQL);
		$stmt->execute([$dummyName, $dummyGender]);
		echo "Dummy ID added: $dummyID. \n";
	}

	function createRel($id1, $id2, $type) {
		// TODO: Check for and Prevent duplicate rows

		global $pdo;
		echo "Creating Relationship between $id1 & $id2: $type. \n";
		$createRelSQL = 'INSERT INTO rel (id1, id2, type) values (?, ?, ?)';
		$stmt = $pdo->prepare($createRelSQL);
		$stmt->execute([$id1, $id2, $type]);

		echo "Relationship added: $id1 is $id2's $type. \n";
	}

	// insertDummy(4);
	// createRel("100002", "100003", 'parent');
	// createRel("100002", "100005", 'spouse');

	function genDummyTree() {
		global $pdo;
		/*
		What does it take to procedurally generate a random tree structure?
		I need to define bounds. How many levels, for one. Max num of children per couple.
		Simplest structure assumes no remarriages.
		How to ensure gender consistency?
		Are there algorithms for this kind of thing?

		The biggest problem to generating top-down is that spouses mustn't share ancestors. Simplistically, a spouse could be presumed to be the root node of its own tree; this assumes that their children are being viewed from the perspective of the other spouse's family.
		*/
	}



	/*
	Suppose I want a function that creates an entire family unit. What's the way that would occur? Thinking from user perspective.
	User inputs names, not ids. I have to retrieve ids for each name. If names aren't in 'ids', I must create name rows and save their ids. If names are in 'ids', but they are not connected in 'rels', I must create relationship rows.
	*/


?>