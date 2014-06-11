<!-- This is the main page for the registration application and contains a form that 
is sent for validation -->

<?php
session_start(); //Start the session

global $err; echo $err;//Global variable needed

if(isset($_SESSION['ERRMSG']) && is_array($_SESSION['ERRMSG']) && count($_SESSION['ERRMSG']) >0 )
{ //If the error session exists
	$err = "<table>"; //Start a table
	foreach($_SESSION['ERRMSG'] as $msg) { //Get each error
	$err .= "<tr><td>" . $msg . "</td></tr>"; //Write them to a variable
	}
	$err .= "</table>"; //Close the table
	unset($_SESSION['ERRMSG']); //Delete the session
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>UBI Stories - Register</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/registration.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css"

</head>
<body>
    <div id="main">
        <h1>UBI Stories</h1> 

	<!--  The form used for registration -->	
    <form action="reg_val.php" method="post">
             
        <table width="100%">
            <tr>
                <td>
                    <label for="nickname">Nickname </label>                      
                </td>
                <td class="inputbox">
                    <input id="nickname" type="text" name="nickname" minlength="3" maxlength="6" required autofocus>    
                </td>
            </tr>
             <tr>
                <td>
                    <label for="age">Age</label>                     
                </td>
                <td class="inputbox">
                    <input id="age" type="number" min="1" max="150" name="quantity" required>   
                </td>
            </tr>
            <tr>
                <td>
                    <label for="male">Male</label>                     
                </td>
                <td class="inputbox">
                    <input class="radiob" type="radio" name="sex" value="0" required>  
                </td>
            </tr>
            <tr>
                <td>
                    <label for="male">Female</label>                     
                </td>
                <td class="inputbox">
                    <input class="radiob" type="radio" name="sex" value="1" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label>                    
                </td>
                <td class="inputbox">
                    <input id="password" type="password" name="password" min="3" maxlength="6" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="rpassword">Repeat</label>                    
                </td>
                <td class="inputbox">
                    <input id="rpassword" maxlength="6" type="password" name="rpassword" required>
                </td>
            </tr>
        </table>
            
        <fieldset>    
            <button type="submit">>>&nbsp;&nbsp;&nbsp;Register</button>
        </fieldset>    
    </form>
        <div class="error_box"><p class="error"><?php echo $err;?></p></div>
    
    </div>
</body>
</html>