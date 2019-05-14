<!doctype html>
<!-- simple.html -->

<?php
//Step1
 $db = new mysqli('classmysql.engr.oregonstate.edu','cs340_wallerir','9958','cs340_wallerir')
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
        <title>Starwars Characters</title>
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
			margin: 5px;
			}
			input[type=text] {
			box-sizing: border-box;
			}
			form {
				background-color: red;
				width: 10%;
				margin: 5px;
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
        <div align="center">STARWARS CHARACTERS</div>
    </h2>

    <body background="StarWars.jpg">

		<div align="center">
		
			<?php  
			//Step2
			$query = "SELECT *,sw_characters.ID as cID, sw_characters.Name as cName, sw_planets.Name as pName FROM sw_characters, sw_planets WHERE sw_characters.`Home Planet` = sw_planets.ID";
			mysqli_query($db, $query) or die('Error querying database.');	
		
			//Step3
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			
			
			echo '<table align="center">';
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>Home Planet</th>";
			echo "<th>Race</th>";
			echo "<th>ID</th>";
			echo "</tr>";
			
			while($row = mysqli_fetch_array($result)){
				
				echo "<tr>";
				echo "<td>" .$row['cName']. "</td>";
				echo "<td>" .$row['pName']. "</td>";
				echo "<td>" .$row['Race']. "</td>";
				echo "<td>" .$row['cID']. "</td>";
				//echo "<td>"  .    . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			
			//Step 4
			
			?>
		</div>
		
		<div align="center">Add Character</div>
		<div align="center">
			<?php
			$nameVar = $_POST['name']; 
			$homeVar = $_POST['homePlanet'];
			$raceVar = $_POST['Race'];
			
			if(isset($_POST['Submit'])){
				$sql = "INSERT INTO sw_characters (`Name`, `Home Planet`, `Race`) VALUES 
				('$nameVar', $homeVar, '$raceVar')";
				
				//$stmt = mysqli_prepare($sql);
				
				//$stmt->bind_param("ssss", $_POST['name'], $_POST['homePlanet'], $_POST['Race'], $_POST['ID']);
				
				mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);
				echo '<meta http-equiv="refresh" content="0" />';
				mysqli_close($db);
			}
			
			?>
			
			<form method="post" action="characters.php" >
			<label id="name"> Name: </label><br/>
			<input type="text" name="name"  />
			<br>
			<label id="home"> Home Planet: </label><br/>
			
			<?php
			//Step2
			$query = "SELECT ID, sw_planets.Name as pName FROM sw_planets";
			mysqli_query($db, $query) or die('Error querying database.');	
		
			//Step3
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);
			
			echo "<select name='homePlanet' id='homePlanet'>";
			
			while($row = mysqli_fetch_array($result)){
				echo "<option value=". $row['ID'] .">".$row['pName']."</option>";
				
			}
			
			echo "</select>";	
			
			?>
			
			<br>
			<label id="race"> Race: </label><br/>
			<input type="text" id="Race" name="Race"/>
			<br>
			<button type="submit" name="Submit">Submit</button>
			</form>
			
			
		</div>
		<br>
		<br>
		<br>
		<div align="center">Remove Character</div>
		<div align="center">
			<?php
			$NameVar = $_POST['Name']; 
		
			
			if(isset($_POST['submit'])){
				$sql = "DELETE FROM sw_characters WHERE name='$NameVar'";
				
				//$stmt = mysqli_prepare($sql);
				
				//$stmt->bind_param("ssss", $_POST['name'], $_POST['homePlanet'], $_POST['Race'], $_POST['ID']);
				
				mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);
				echo '<meta http-equiv="refresh" content="0" />';
				mysqli_close($db);
			}
			header("Refresh:2; url=web.engr.oregonstate.edu/~tsangl/STARWARSDB/characters.php");
			?>
			
			<form method="post" action="characters.php" >
				<label id="Name"> Full Name: </label><br/> 
				<input type="text" name="Name"  />
				
				<button type="submit" name="submit">Submit</button>
			</form>
		</div>
		
		<br>
		<br>
		<div align="center">Update Character</div>
		<div align="center">
			<?php
			$cnameVar = $_POST['cname']; 	
			$newNameVar = $_POST['nName'];
			$chomeVar = $_POST['chomePlanet'];
			$craceVar = $_POST['cRace'];
			
			if(isset($_POST['Ssubmit'])){
				$sql = "UPDATE sw_characters SET name='$newNameVar', `Home Planet`=$chomeVar, Race='$craceVar' WHERE name='$cnameVar'";
				
				//$stmt = mysqli_prepare($sql);
				
				//$stmt->bind_param("ssss", $_POST['name'], $_POST['homePlanet'], $_POST['Race'], $_POST['ID']);
				
				mysqli_query($db, $sql) or die("Error: " . $sql . "<br>" . $db->error);
				
				echo '<meta http-equiv="refresh" content="0" />';
				
				mysqli_close($db);
			}
			?>
			
			
			<form method="post" action="characters.php" >
				<label id="Name"> Original Name: </label><br/> 
				<input type="text" name="cname"  />
				<br>
				<label id="Name"> New Name: </label><br/> 
				<input type="text" name="nName"  />
				<br>
				<label id="home"> New Home Planet ID: </label><br/>
				<input type="number" step="1" id="homePlanet" name="chomePlanet"/>
				<br>
				<label id="race"> New Race: </label><br/>
				<input type="text" id="Race" name="cRace"/>
				<br>
				<button type="submit" name="Ssubmit">Submit</button>
			</form>
		</div>
		
        <br>
    </body>
<html>
    
    
    
    