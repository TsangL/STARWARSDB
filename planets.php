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
        <title>Starwars Planets</title>
        <link rel="stylesheet" href="CSS/CSSStuff.css">
        
        
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
        <div align="center">STARWARS PLANETS</div>
	</h2>
	<hr>
	
    <body>
		<div>
			<?php  
			//Step2
			$query = "SELECT * FROM sw_planets";
			mysqli_query($db, $query) or die('Error querying database.');	
		
			//Step3
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			
			echo "<table border=1>";
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>ID</th>";
			echo "<th>System</th>";
			echo "<th>Biome</th>";
			echo "<th>Population</th>";
			echo "</tr>";
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<tr>";
				echo "<td>" .$row['Name']. "</td>";
				echo "<td>" .$row['ID']. "</td>";
				echo "<td>" .$row['System']. "</td>";
				echo "<td>" .$row['Biome']. "</td>";
				echo "<td>" .$row['Population']. "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
			?>
		</div>
        <br>
		<div align="left">Add Planet</div>
		<div>
			<?php
			$nameVar   = $_POST['name']; 
			$systemVar = $_POST['system'] ;
			$biomeVar  = $_POST['biome'];
			$popVar    = $_POST['pop'];
			
			if(isset($_POST['Submit'])){
				$sql = "INSERT INTO sw_planets (Name, System, Biome, Population) VALUES 
				('$nameVar', '$systemVar', '$biomeVar', $popVar)";
				
				//$stmt = mysqli_prepare($sql);
				
				//$stmt->bind_param("ssss", $_POST['name'], $_POST['homePlanet'], $_POST['Race'], $_POST['ID']);
				
				mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);
				echo '<meta http-equiv="refresh" content="0" />';
				mysqli_close($db);
			}
			?>
		
			<form method="post" action="planets.php" >
				<label id="name"> Name: </label><br/> 
				<input type="text" name="name"  />
				<br>
				<label id="star"> Star System: </label><br/>
				<input type="text" id="system" name="system"/>
				<br>
				<label id="biome"> Biome: </label><br/>
				<input type="text" id="biome" name="biome"/>
				<br>
				<label id="home"> Population: </label><br/>
				<input type="number" step="1" id="pop" name="pop"/>
				<br>
				<button type="submit" name="Submit">Submit</button>
			</form>
		</div>
		
        <br>
        <hr>
    </body>
<html>
    
    
    
    