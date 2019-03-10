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
        <title>Starwars Ships</title>
        <link rel="stylesheet" href="css/CSSStuff.css">
        
        
    </head>
        <div id="picture1">
            <img src= "og-generic_02031d2b.png" alt="Starwars" width="100" height="100">
        </div>
        
    <h2>
        <br>
        <div align="center">STARWARS SHIPS</div>
        <div align="center">CSS COMING SOON    -RYAN </div>
      
    </h2>
    <br>
    <hr>
    <br>
    <body>
	
        <div id="menulist">
		<br>
		<br>
		
				<ul>
					<li class="medium1"> Site Menu: </li>  
					<br>
					<li class="small1"><a href="index.php"> Home </a></li> 
					<br>
					<li class="small1"><a href="characters.php"> StarWars Characters </a></li> 
					<br>
					<li class="small1"><a href="planets.php"> StarWars Planets </a></li> 
					<br>
					<li class="small1"><a href="ships.php"> StarWars Ships </a></li>
					<br>
					<li class="small1"><a href="weapons.php"> StarWars Weapons </a></li>
					
				
				</ul>
        </div>
		<br>
		<br>
		<br>
		<div align="left">Add Ship</div>
		<div>
			<?php  
			//Step2
			$query = "SELECT * FROM sw_ships";
			mysqli_query($db, $query) or die('Error querying database.');	
		
			//Step3
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			
			echo "<table border=1>";
			echo "<tr>";
			echo "<th>VIN number</th>";
			echo "<th>Name</th>";
			echo "<th>Type</th>";
			echo "<th>Owner</th>";
			echo "<th>Weapon</th>";
			echo "<th>Speed</th>";
			echo "<th>Model</th>";
			echo "</tr>";
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<tr>";
				echo "<td>" .$row['VIN Number']. "</td>";
				echo "<td>" .$row['Name']. "</td>";
				echo "<td>" .$row['Type']. "</td>";
				echo "<td>" .$row['Owner']. "</td>";
				echo "<td>" .$row['Weapon']. "</td>";
				echo "<td>" .$row['Speed']. "</td>";
				echo "<td>" .$row['Model']. "</td>";
				echo "</tr>";
			}
			
			echo "</table>";
			
			
			?>
		</div>
        <br>
		<div>
			<?php
			$nameVar   = $_POST['name']; 
			$typeVar   = $_POST['type'] ;
			$ownerVar  = $_POST['owner'];
			$weaponVar = $_POST['weapons'];
			$speedVar  = $_POST['spd'];
			$modelVar  = $_POST['model'];
			
			
			if(isset($_POST['Submit'])){
				$sql = "INSERT INTO sw_ships ( Name, Type, Owner, Weapon, Speed, Model) VALUES 
				('$nameVar', '$typeVar', '$ownerVar', '$weaponVar', '$speedVar', '$modelVar')";
				
				//$stmt = mysqli_prepare($sql);
				
				//$stmt->bind_param("ssss", $_POST['name'], $_POST['homePlanet'], $_POST['Race'], $_POST['ID']);
				
				mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);
				echo '<meta http-equiv="refresh" content="0" />';
				mysqli_close($db);
			}
			?>
		
			<form method="post" action="ships.php" >
				<label id="name"> Name: </label><br/> 
				<input type="text" name="name"  />
				<br>
				<label id="star"> Type: </label><br/>
				<input type="text" id="type" name="type"/>
				<br>
				<label id="biome"> OwnerID: </label><br/>
				<input type="number" step="1" id="owner" name="owner"/>
				<br>
				<label id="home"> WeaponID: </label><br/>
				<input type="number" step="1" id="weapons" name	= "weapons"/>
				<br>
				<label id="home"> Speed(km/h): </label><br/>
				<input type="number" step="1" id="spd" name="spd"/>
				<br>
				<label id="biome"> Model: </label><br/>
				<input type="text" id="model" name="model"/>
				<br>
				<button type="submit" name="Submit">Submit</button>
			</form>
		</div>
        <br>
        <hr>
    </body>
<html>
    
    
    
    