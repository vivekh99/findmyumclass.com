<?php


include "database_connection.php";
//search database for input

	$by_desire_to_take = $_POST['desire_to_take'];
	$by_understanding = $_POST['understanding'];
	$by_workload = $_POST['workload'];
	$by_Aplus = $_POST['num_Aplus'];
	$by_num_A = $_POST['num_A'];
	$by_num_Aminus = $_POST['num_Aminus'];
	$by_num_Bplus = $_POST['num_Bplus'];
	$by_num_B = $_POST['num_B'];
	$by_num_Bminus = $_POST['num_Bminus'];
	$by_num_Cplus = $_POST['num_Cplus'];
	$by_num_C = $_POST['num_C'];
	$by_num_Cminus = $_POST['num_Cminus'];
	

    //Do real escaping here

    $query = "SELECT * FROM courses"; //WHERE `A+` >= $by_Aplus AND `Workload` <= $by_workload";
    $conditions = array();

    if(! empty($by_desire_to_take)) {
      $conditions[] = "`Desire_to_Take` >= $by_desire_to_take";
    }
    if(! empty($by_understanding)) {
      $conditions[] = "`Understanding` >= $by_understanding";
    }
    if(! empty($by_workload)) {
      $conditions[] = "`Workload` <= $by_workload";
    }
    if(! empty($by_Aplus)) {
      $conditions[] = "`A+` >= $by_Aplus";
	}
	if(! empty($by_num_A)) {
		$conditions[] = "`A` >= $by_num_A";
	}
	if(! empty($by_num_Aminus)) {
		$conditions[] = "`A-` >= $by_num_Aminus";
	}
	if(! empty($by_num_Bplus)) {
		$conditions[] = "`B+` >= $by_num_Bplus";
	}
	if(! empty($by_num_B)) {
		$conditions[] = "`B` >= $by_num_B";
	}
	if(! empty($by_num_Bminus)) {
		$conditions[] = "`B-` >= $by_num_Bminus";
	}
	if(! empty($by_num_Cplus)) {
		$conditions[] = "`C+` >= $by_num_Cplus";
	}
	if(! empty($by_num_C)) {
		$conditions[] = "`C` >= $by_num_C";
	}
	if(! empty($by_num_Cminus)) {
		$conditions[] = "`C-` >= $by_num_Cminus";
	}


    $sql = $query;
    if (count($conditions) > 0) {
    	$sql .= " WHERE " . implode(' AND ', $conditions);
    }

	echo $sql;

	echo "<br>";
	echo "<br>";
    //$result = mysql_query($sql);


	$result = $myDB->query($sql);
	

	if ($result->num_rows > 0) {
	
		//output data of row
		while ($row = $result->fetch_assoc()) {
			echo $row["ClassName"] . " Desire_to_Take " . $row["Desire_to_Take"]
			 . " Understanding " . $row["Understanding"] . " Workload " . $row["Workload"] . " A+ " . $row["A+"]
			  . " A " . $row["A"] . " A- " . $row["A-"] . " B+ " . $row["B+"] . " B " . $row["B"] . " B- " . $row["B-"] . " C+ " . $row["C+"]
			   . " C " . $row["C"] . " C- " . $row["C-"] . "<br>";
		}
	}
	else {
		echo "no results mate";
	}


$myDB->close();


?>

