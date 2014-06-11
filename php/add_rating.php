<!--This file is creating the rating buttons which connect the ratethose.php -->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link href="../css/fonts.css" rel="stylesheet"  type="text/css" charset="utf-8" />    
</head>
    


    <body>
<!--	The rating buttons, users can add rating by 1-5	-->
        <form id="rateform" action="ratethose.php" method="get">
		
			<span id="rating_text">Rate: </span>	
            <input type="submit" name = "rate_value" class="buttie" value="1"></input>
            <input type="submit" name = "rate_value" class="buttie" value="2"></input>
            <input type="submit" name = "rate_value" class="buttie" value="3"></input>
            <input type="submit" name = "rate_value" class="buttie" value="4"></input>
            <input type="submit" name = "rate_value" class="buttie" value="5"></input>
           </form>
          
    </body>

</html>