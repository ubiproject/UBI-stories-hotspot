<!-- This is a validation logic for the registration application -->
<?php
session_start(); //Start session

include("../php/db_connect.php"); //Connect to MySQL
    
    function Fix($str) { //Clean the fields
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
		return mysql_real_escape_string($str);
    }

$errmsg = array(); //Array to store errors
$errflag = false; //Error flag

$nickname = Fix($_POST['nickname']); //Nickname
$password = Fix($_POST['password']); //Password
$rpassword = Fix($_POST['rpassword']); //Repeated Password
$age = Fix($_POST['quantity']);//Given age
$gender = Fix($_POST['sex']); //0 = Male, 1 = Female


//Check, if Password and Repeated Pasword match
if(strcmp($password, $rpassword) != 0 ) {
	$errmsg[] = 'Passwords do not match'; ////Error message
	$errflag = true; //Set the error flag
}

//Make sure Nickname is available
if($nickname != '') {
	$query = "SELECT * FROM users WHERE nickname = '$nickname'"; //MySQL query
	$result = mysql_query($query);
	if($result) {
		if(mysql_num_rows($result) > 0) { //If Nickname is in use
			$errmsg[] = 'A user with that nickname already exists. Please Choose another nickname.'; //Error message
			$errflag = true; //Set the error flag
		}
	mysql_free_result($result);
	}
}

//If there are input validations, redirect back to the registration form
if($errflag) {
	$_SESSION['ERRMSG'] = $errmsg; //Write errors
	session_write_close(); //Close session
	header("location: ../registration/index.php"); //Redirect
	exit(); //Block scripts
}

//Create INSERT query
$query = "INSERT INTO users(nickname, password, age, gender) 
		  VALUES('$nickname','" . md5($password) . "','$age','$gender')";
$result = mysql_query($query);

//Check whether the query was successful or not
if($result) {
   
        $errmsg[] = 'You have successfully registered, ' . $nickname . "!"; //Error message
			$errflag = true; //Set the error flag
        
        $_SESSION['ERRMSG'] = $errmsg; //Write errors
	session_write_close(); //Close session
	header("location: ../registration/index.php"); //Redirect
	exit(); //Block scripts


    //exit();
} else {
        echo $nickname . $password . $rpassword . $gender . $age;
	die("There was a connection error, please try again later");
}

?>
