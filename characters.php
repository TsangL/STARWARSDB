<!doctype html>
<!-- simple.html -->

<?php
//Step1
 $db = new mysqli('classmysql.engr.oregonstate.edu','cs340_wallerir','9958','cs340_wallerir')
 or die('Error connecting to MySQL server.');
?>

<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Cookie Cutter</title>
        <link rel="stylesheet" href="css/CSSStuff.css">
        
        
    </head>
        <div id="picture1">
            <img src= "og-generic_02031d2b.png" alt="Starwars" width="100" height="100">
        </div>
        
    <h2>
        <br>
        <div align="center">STARWARS CHARACTERS</div>
        
        
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
		<div>
		
			<?php  
			//Step2
			$query = "SELECT * FROM sw_characters";
			mysqli_query($db, $query) or die('Error querying database.');	
		
			//Step3
			$result = mysqli_query($db, $query);
			$row = mysqli_fetch_array($result);

			while ($row = mysqli_fetch_array($result)) {
			echo $row['Name'] . '    |    ' . $row['Home Planet'] . '    |    ' . $row['Race'] . '    |    ' . $row['ID'] .'<br />';
			}
			//Step 4
			
			?>
		</div>
        <br>
		
			
		<div>
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
				
				mysqli_close($db);
			}
			?>
		
			<form method="post" action="characters.php" >
				<label id="name"> Name: </label><br/> 
				<input type="text" name="name"  />
				<br>
				<label id="home"> Home Planet ID: </label><br/>
				<input type="number" step="1" id="homePlanet" name="homePlanet"/>
				<br>
				<label id="race"> Race: </label><br/>
				<input type="text" id="Race" name="Race"/>
				<br>
				<button type="submit" name="Submit">Submit</button>
			</form>
		</div>
        <br>
        <hr>
    </body>
<html>
    
    
    
    