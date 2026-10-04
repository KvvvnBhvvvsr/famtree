<?php 
	echo "Hello World<br>";
	echo "I'm still a fool<br>";
	echo "Today I will try to build some basic functions to expand a famtree from a given starting node/person. <br><br>"
?>

<?php

	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "names";

	$dsn = "mysql:host=" . $host . ";dbname=" .$dbname;

	try {
		$pdo = new PDO($dsn, $user, $pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		die("Couldn't connect. " . $e->getMessage());
	}

?>

<?php

	function getName($id) {
		/* 
			This function returns the name associated with a given id.
		*/
		global $pdo;
		$getNameSQL = 'SELECT name FROM ids WHERE id = ?';
		$stmt = $pdo->prepare($getNameSQL);
		$stmt->execute([$id]);
		echo "Name = ";
		$result = $stmt->fetchAll();
		// var_dump($result);
		$name = $result[0]["name"];
		echo "$name.<br>";
		return $name;
	}

	function getSpouse($id) {
		/*
			This function returns an array of ids related by marriage to a given id.
		*/
		global $pdo;
		$getSpouseSQL = 'SELECT id1, id2 FROM rel WHERE (id1 = ? or id2 = ?) AND type = ?';
		$stmt = $pdo->prepare($getSpouseSQL);
		$stmt->execute([$id, $id, "spouse"]);
		$result = $stmt->fetchAll();
		// var_dump($result);
		$spouses = [];
		foreach ($result as $key => $value) {
			if ($value["id1"] == $id) {
				$spouses[] = $value["id2"];
			} elseif ($value["id2"] == $id) {
				$spouses[] = $value["id1"];
			}
		}
		// var_dump($spouses);
		return $spouses;
	}

	function getParents($childid) {
		global $pdo;
		$getParentsSQL = 'SELECT id1 FROM rel WHERE (id2 = ?) and type = ?';
		$stmt = $pdo->prepare($getParentsSQL);
		$stmt->execute([$childid, "parent"]);
		$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
		return $result;
	}

	function getChildren($parentid, $spouseid = -1) {
		/*
			This function takes as input a parent
			Returns all children associated with that parent

			We'll worry about connecting the family unit by associating a spouse later
		*/
		global $pdo;
		$getChildrenSQL = 'SELECT * FROM rel WHERE id1 = ? AND type = ?';
		$stmt = $pdo->prepare($getChildrenSQL);
		$stmt->execute([$parentid, "parent"]);
		$result = $stmt->fetchAll();
		// var_dump($result);
		echo "<br>";
		$children = [];
		foreach ($result as $key => $value) {
			$childid = $value["id2"];
			if ($spouseid > 0) {
				$parents = getParents($childid);
				if (in_array($spouseid, $parents)) {
					$children[] = $childid;
				}
			} else {
				$children[] = $childid;
			}
		}
		return $children;
	}

	// getName(900006);
	// var_dump(getChildren(900001));
	// echo "<br>";
	// var_dump(getChildren(900004));
	// echo "<br>";
	// var_dump(getChildren(900004, 900007));
	// var_dump(getSpouse(900003));
	// var_dump(getSpouse(900004));
	// var_dump(getParents(900006));
?>