<!doctype html>
<!-- simple.html -->

<?php
//Step1
 $db = mysqli_connect('classmysql.engr.oregonstate.edu','cs340_wallerir','9958','cs340_wallerir')
 or die('Error connecting to MySQL server.');
?>
<script>
	if( window.history.replaceState)
	{
		window.history.replaceState(null, null, window.location.href);
	}
</script>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Starwars Weapons</title>
		<link rel="stylesheet" href="CSS/CSSStuff.css">
		<style type="text/css">
			table {
			margin: 8px;
			padding:10px; 
			}

			th {
			font-family: Arial, Helvetica, sans-serif;
			font-size: .7em;
			background: #666;
			color: #FFF;
			padding: 2px 6px;
			border-collapse: separate;
			border: 1px solid #000;
			color: white;
			}
			td {
			font-family: Arial, Helvetica, sans-serif;
			font-size: .7em;
			border: 1px solid #DDD;
			color: white;
			background-color: black;
			}
			label {
			color: white;
			}
			form {
				background-color: red;
				width: 10%;
			}
		</style>
        
        
	</head>
	
	<div class="menulist">
				<ul>
					<li class="small1"><a href="index.php"> Home </a></li>
					<li class="small1"><a href="characters.php"> StarWars Characters </a></li>					
					<li class="small1"><a href="planets.php"> StarWars Planets </a></li>					
					<li class="small1"><a href="ships.php"> StarWars Ships </a></li>					
					<li class="small1"><a href="weapons.php"> StarWars Weapons </a></li>
				</ul>
		</div>
		
    <h2>
        <br>
        <div align="center">STARWARS WEAPONS</div>   
	</h2>

    <body background="StarWars.jpg">
		
		<div align="center">
			<?php  
			//Step2
			$query = "SELECT * FROM sw_weapons";
			mysqli_query($db, $query) or die('Error querying database.');	
		
			//Step3
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			
			echo "<table border=1>";
			echo "<tr>";
			echo "<th>Serial</th>";
			echo "<th>Name</th>";
			echo "<th>Type</th>";
			echo "<th>Model</th>";
			echo "</tr>";
			
			while($row = mysqli_fetch_array($result)){
				
				$serialVar = $row['Serial'];
				$nameVar = $row['Name'];
				$typeVar = $row['Type'];
				$modelVar = $row['Model'];
				
				echo "<tr>";
				echo "<td>" .$serialVar. "</td>";
				echo "<td>" .$nameVar. "</td>";
				echo "<td>" .$typeVar. "</td>";
				echo "<td>" .$modelVar. "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
			?>
		</div>
		<br>
		
		
        <br>
		<div align="center">Add Weapon</div>
		<div align="center">
			<?php
			$nameVar   = $_POST['name']; 
			$typeVar   = $_POST['type'] ;
			$modelVar  = $_POST['model'];
			
			
			if(isset($_POST['Submit'])){
				$sql = "INSERT INTO sw_weapons( Name, Type, Model) VALUES 
				('$nameVar', '$typeVar', '$modelVar')";
				
				//$stmt = mysqli_prepare($sql);
				
				//$stmt->bind_param("ssss", $_POST['name'], $_POST['homePlanet'], $_POST['Race'], $_POST['ID']);
				
				mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);
				echo '<meta http-equiv="refresh" content="0" />';
				mysqli_close($db);
				
			}
			?>
		
			<form method="post" action="weapons.php" >
				<label id="name"> Name: </label><br/> 
				<input type="text" name="name"  />
				<br>
				<label id="star"> Type: </label><br/>
				<input type="text" id="type" name="type"/>
				<br>
				<label id="biome"> Model: </label><br/>
				<input type="text" id="model" name="model"/>
				<br>
				<button type="submit" name="Submit">Submit</button>
			</form>
		</div>
		</div>
		
        <br>
    </body>
<html>
    
    
    
    