
<?php
	include "database_connection.php";
//search database for input
if(isset($submit)){
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
}

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel= "stylesheet" href="search_bar_style.css">
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>
   <body>


<!-- 
ClassName
Desire_to_Take
Understanding
Workload
A+
A
A-
B+
B
B-
C+
C
C-
D+
D
D-
E -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- The form -->
	<h3 class="header">Search for Classes!<h3>
		<div class="search-bar">
			<form class="search-fields" action="search_text.php" method="post">
				<input class="searchbox1" type="text" placeholder="Desire to Take %" name="desire_to_take">
				<input class="searchbox2" type="text" placeholder="Understanding %" name="understanding">
				<input class="searchbox3" type="text" placeholder="Workload %" name="workload">
				<input class="searchbox4" type="text" placeholder="% of A+'s" name="num_Aplus">
				<input class="searchbox5" type="text" placeholder="% of A's" name="num_A">
				<input class="searchbox6" type="text" placeholder="% of A-'s" name="num_Aminus">
				<input class="searchbox7" type="text" placeholder="% of B+'s" name="num_Bplus">
				<input class="searchbox8" type="text" placeholder="% of B's" name="num_B">
				<input class="searchbox9" type="text" placeholder="% of B-'s" name="num_Bminus">
				<input class="searchbox10" type="text" placeholder="% of C+'s" name="num_Cplus">
				<input class="searchbox11" type="text" placeholder="% of C's" name="num_C">
				<input class="searchbox12" type="text" placeholder="% of C-'s" name="num_Cminus">
				<button class="searchbtn" type="submit"><i class="fas fa-search"></i></button>
			</form>
		</div>
	</body>
</html>