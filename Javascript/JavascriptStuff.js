//are all the required fields filled in, do the password and confirmed password fields match (Maybe minimum number of characters, use of lower and uppercase letters, numeral and/or special characters)
//does the email address contain a @ symbol, is it not already in the database?                


//validate the users input





//check the database for duplicate user names

		
		
//1. check to see if the basic form data is valid, javascript is implemented. 
 
function validation(accountFormObject) {									//"class" to create each new account

    var Password = document.getElementById('Password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var Username = document.getElementById('username').value;
    var email = document.getElementById('E-mail').value;
			
			
    var check1 = false;	
    var check2 = false;
    var check3 = false;
		
			
    //check 1  for password
    if (Password.length > 5) {
        if (Password === confirmPassword) {
            check1 = true;
        } else {alert("Your passwords do not match");}
    } else {alert("Your password is not long enough");}
		
    //check 2  for @ in email
    if (email != "") {
        check2 = true;
    } else {alert("Your email is blank");}
			
    //check 3  for a filled out username
    if (Username.length != 0) {
        check3 = true;
    } else { alert("your username is not long enough")}
			
    //If all checks are true
    if (check1 === true && check2 === true && check3 === true) {
        return true;
    } else {
        return false;
    }

}
		
		


	








