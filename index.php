
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="search_bar_style.css" />
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	</head>
   	<body>
   <!-- <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css"> -->

		
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
	<h3 class="header">Search for Classes! <br>
	How to use: Search for classes based on workload or grade percentages. <br>
	You do NOT have to enter a value into every parameter.	<br>

	Note: <br>
	If a value is designated as "NA" it means "Not Available" and the data did not exist at the time. <br>
	Not all courses are listed for LSA, however, all courses are listed for CoE. <br>
	Please use google chrome when using this website.
	</h3>
		<div class="search-bar">
			<form id="searchForm" class="search-fields" action="" method="post">
				<input id="searchWorkload" class="searchbox3" type="text" placeholder="Workload %" name="workload">
				<input id="searchArange" class="searchbox14" type="text" placeholder="% of A- & Above" name="num_Arange">
				<input id="searchCollege" class="searchbox5" type="text" placeholder="Department" name="college">
					<div class="advanced-search-box"  id="advanced-search-box">
		
						<input id="searchDesire" class="searchbox1" type="text" placeholder="Desire to Take %" name="desire_to_take">
						<input id="searchUnderstanding" class="searchbox2" type="text" placeholder="Understanding %" name="understanding">
						<input id="searchAplus" class="searchbox4" type="text" placeholder="% of A+'s" name="num_Aplus">
						<input id="searchA" class="searchbox6" type="text" placeholder="% of A's" name="num_A">
						<input id="searchAminus" class="searchbox7" type="text" placeholder="% of A-'s" name="num_Aminus">
						<input id="searchBplus" class="searchbox8" type="text" placeholder="% of B+'s" name="num_Bplus">
						<input id="searchB" class="searchbox9" type="text" placeholder="% of B's" name="num_B">
						<input id="searchBminus" class="searchbox10" type="text" placeholder="% of B-'s" name="num_Bminus">
						<input id="searchCplus" class="searchbox11" type="text" placeholder="% of C+'s" name="num_Cplus"> 
						<input id="searchC" class="searchbox12" type="text" placeholder="% of C's" name="num_C">
						<input id="searchCminus" class="searchbox13" type="text" placeholder="% of C-'s" name="num_Cminus">

					</div>
				<button id="searchBtn" class="search-btn" type="submit" name="submitBtn"><i class="fas fa-search"></i></button>
			</form>
		</div>
		<button class="advanced-search" id="adv-search-btn">Advanced Search</button>
		<!-- <div class="advanced-search-box"  id="advanced-search-box">
			<form>
				<input id="searchDesire" class="searchbox1" type="text" placeholder="Desire to Take %" name="desire_to_take">
				<input id="searchUnderstanding" class="searchbox2" type="text" placeholder="Understanding %" name="understanding">
				<input id="searchAplus" class="searchbox4" type="text" placeholder="% of A+'s" name="num_Aplus">
				<input id="searchA" class="searchbox6" type="text" placeholder="% of A's" name="num_A">
				<input id="searchAminus" class="searchbox7" type="text" placeholder="% of A-'s" name="num_Aminus">
				<input id="searchBplus" class="searchbox8" type="text" placeholder="% of B+'s" name="num_Bplus">
				<input id="searchB" class="searchbox9" type="text" placeholder="% of B's" name="num_B">
				<input id="searchBminus" class="searchbox10" type="text" placeholder="% of B-'s" name="num_Bminus">
				<input id="searchCplus" class="searchbox11" type="text" placeholder="% of C+'s" name="num_Cplus"> 
				<input id="searchC" class="searchbox12" type="text" placeholder="% of C's" name="num_C">
				<input id="searchCminus" class="searchbox13" type="text" placeholder="% of C-'s" name="num_Cminus">
				
			</form>
		</div> -->

		<script>
			var advSearchBtn = document.getElementById("adv-search-btn");
			var advancedSearchBox = document.getElementById("advanced-search-box");

			advSearchBtn.onclick = function(){
				advancedSearchBox.style.display = "block";
			}

		</script> 

	<table class="search-results-table">
		<thead>
			<tr class="header-list">
				<th class="coursename">Course Name</th>
				<th>Workload %</th>
				<th>% of A+'s</th>
				<th>% of A's</th>
				<th>% of A-'s</th>
				<th>% of B+'s</th>
				<th>% of B's</th>
				<th>% of B-'s</th>
			</tr>
		</thead>
	
		<?php

		include "database_connection.php";
		//search database for input
		if ( isset( $_POST['submitBtn'] ) ) { 
			$by_desire_to_take = $_POST['desire_to_take'];
			$by_understanding = $_POST['understanding'];
			$by_workload = $_POST['workload'];
			$by_college = $_POST['college'];
			$by_Arange = $_POST['num_Arange'];
			$by_Aplus = $_POST['num_Aplus'];
			$by_num_A = $_POST['num_A'];
			$by_num_Aminus = $_POST['num_Aminus'];
			$by_num_Bplus = $_POST['num_Bplus'];
			$by_num_B = $_POST['num_B'];
			$by_num_Bminus = $_POST['num_Bminus'];
			$by_num_Cplus = $_POST['num_Cplus'];
			$by_num_C = $_POST['num_C'];
			$by_num_Cminus = $_POST['num_Cminus'];
			

			//ADD escaping here!!!!!!!!!!!!!!!!!

			$query = "SELECT * FROM new_courses";
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
			if(! empty($by_college)) {
				$conditions[] = "College LIKE '%$by_college%'";
			}

			if(!empty($by_Arange)) {
				$conditions[] = "`A+` <= $by_Arange";
				$conditions[] = "`A` <= $by_Arange";
				$conditions[] = "`A-` <= $by_Arange";
			}
			else{
				if(!empty($by_Aplus)) {
					$conditions[] = "`A+` >= $by_Aplus";
				}
				if(!empty($by_num_A)) {
					$conditions[] = "`A` >= $by_num_A";
				}
				if(!empty($by_num_Aminus)) {
					$conditions[] = "`A-` >= $by_num_Aminus";
				}
	

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

			// echo "<br>";
			// echo "<br>";
			//$result = mysql_query($sql);


			$result = $myDB->query($sql);
			

			if ($result->num_rows > 0) {
			
				//output data of row
				while ($row = $result->fetch_assoc()) {
					?>
					<!-- <table class="search-results-in-table-format"> -->
						<tr>
							<td><!--<a href="www.google.com" target="_blank">--><?php echo $row["ClassName"]?><!--</a>--></td>
							<td><?php 
								if($row["Workload"] == -2){
									echo "NA";
								}
								else{
									echo $row["Workload"];
								}
								?>
							</td>
							<td><?php 

							//DO SOME SHITE HERE FOR THE A RANGE
								if($row["A+"] == -2){
									echo "NA";
								}
								else if($row["A+"] == -1){
									echo "<1";

								}
								else{
									echo $row["A+"];
								}
								?>
							</td>
							<td><?php
								if($row["A"] == -2){
									echo "NA";
								}
								else if($row["A"] == -1){
									echo "<1";

								}
								else{
									echo $row["A"];
								}
								?>
							</td>
							<td><?php
								if($row["A-"] == -2){
									echo "NA";
								}
								else if($row["A-"] == -1){
									echo "<1";

								}
								else{
									echo $row["A-"];
								}
								?></td>
							<td><?php
								if($row["B+"] == -2){
									echo "NA";
								}
								else if($row["B+"] == -1){
									echo "<1";

								}
								else{
									echo $row["B+"];
								}
								?></td>
							<td><?php
								if($row["B"] == -2){
									echo "NA";
								}
								else if($row["B"] == -1){
									echo "<1";

								}
								else{
									echo $row["B"];
								}
								?></td>
							<td><?php
								if($row["B-"] == -2){
									echo "NA";
								}
								else if($row["B-"] == -1){
									echo "<1";

								}
								else{
									echo $row["B-"];
								}
								echo "<br>"?>
							</td>
						</tr>
					<!-- <table> -->
					
					<?php
					// echo $row["ClassName"] . " Desire_to_Take " . $row["Desire_to_Take"]
					// . " Understanding " . $row["Understanding"] . " Workload " . $row["Workload"] . " A+ " . $row["A+"]
					// . " A " . $row["A"] . " A- " . $row["A-"] . " B+ " . $row["B+"] . " B " . $row["B"] . " B- " . $row["B-"] . "<br>";
				}
			}
			else {
				echo "no results mate";
			}


		$myDB->close();
		}

		?>
	</table>	

	</body>
</html>