<!doctype html>
<!-- simple.html -->
<html lang="en">
    
    <head>
		<?php 
		
		session_start();
		
		?>
		<?php require 'includes/adminsecurity.php';?>
        <meta charset="utf-8">
        <title>Cookie Cutter</title>
        <link rel="stylesheet" href="CSS/CSSStuff.css">
        
        <style type="text/css">
           
        </style>
        
    </head>
        <div id="picture1">
            <img src= "cookielogo.gif" alt="cookiecutter logo" >
        </div>
        
    <h2>
        <br>
		
        <div id="bigspace">Welcome <?php if (isset($_SESSION['username'])) {print $_SESSION['username']; } ?> to Cookie Cutter.com</div>
        
        <div id="italictxt"> Totally Important Page  </div>
    </h2>
        <br>
    <hr>
        <br>
    <body>
        <div id="menulist">
		<br>
		<br>
			<?php if (isset($_SESSION['auth']) && $_SESSION['auth'] >= 1) { ?>
				<ul>
					<li class="medium1"> Site Menu: </li>  
					<br>
					<li class="small1"><a href="index.php"> Home</a></li> 
					<br>
					<li class="small1"><a href="AboutUS.php"> About US </a></li> 
					<br>
					<li class="small1"><a href="FAQs.php"> FAQ's </a></li> 
					<br>
					<li class="small1"><a href="misc.php"> News </a></li>
					<br>
					<li class="small1"><a href="misc.php"> Member Rebates </a></li>
					
					<?php if($_SESSION['auth'] == 5){ // if security clearance of level 5 then show admin link ?>
					<br>
					<li class="small1"><a href="administration.php"> Administration </a></li>
					<?php } ?>
					
					<br>
					<li class="small1"><a href="Logoff.php"> LOGOFF </a></li>
				</ul>
			<?php } else { ?>
				<ul>
					<li class="medium1"> Site Menu: </li>  
					<br>
					<li class="small1"><a href="index.php"> Home</a></li> 
					<br>
					<li class="small1"><a href="AboutUS.php"> About US </a></li> 
					<br>
					<li class="small1"><a href="FAQs.php"> FAQ's </a></li> 
					<br>
					<li class="small1"><a href="JoinToday.php"> Join Today!</a></li> 
					<br>
					<li class="small1"><a href="login.php"> Login </a></li> 
				</ul>
			<?php } ?>
        </div>
        <div id="box">
            <br>
            <div id="partbox">Congratz! You are important!</div>
            <br>
        </div>
        <br>
        <br>
        <br>
        <hr>
    </body>
<html>
    
    
    
    