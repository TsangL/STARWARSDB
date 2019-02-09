<!doctype html>
<!-- simple.html -->
<html lang="en">
    
    <head>
        <script type="text/javascript" src="Javascript/JavascriptStuff.js"></script>&nbsp;
        <script type="text/javascript" src="Javascript/newAccount.js"></script>&nbsp;
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
        <div id="bigspace">Welcome to cookie cutter.com</div>
        
        <div id="italictxt"> "Cookie Cutter.com is dedicated to our customers unique cookie cutting needs."  </div>
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
        </div>
        <div id="box">
            <br>
			That was already taken!
			<br>
			<br>
            <div id="partbox">
			<br>
			
			<form method="post" action="dups.php" id="newAcc" onSubmit="newAccount(this)">
				Username: <input type="text" id="username" name="username"  />
				<br>
				Password: <input type="password" id="Password" name="Password"/>
				<br>
				Confirm Password: <input type="password" id="confirmPassword" name="confirmPassword"/>
				<br>
				E-Mail Address: <input type="E-mail" id="E-mail" name="E-mail"/>
				<br>
				<input type="checkbox" id="Checkbox" name="Checkbox" /> Yes, I would like to be updated
				<br>
				<input type="submit" value="Submit!">
			</form>
			
			<br>
			</div>
            
            <br>
            <br>
            <br>
        </div>
        <br>
        <br>
        <br>
        <hr>
    </body>
<html>
    