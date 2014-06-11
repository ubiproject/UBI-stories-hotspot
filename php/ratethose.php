<html lang="en">
    <head>
        <meta charset="UTF-8">        
        <title>UBI Stories - Display Story</title>
        <link rel="stylesheet" href="../css/main.css">
        <link href="../css/fonts.css" rel="stylesheet"  type="text/css" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
</html>

<?php
/* this page has the logic that updates new rating into the database */

session_start(); //Start session
include("db_connect.php"); //Connect to SQL
$rate_value = $_GET['rate_value'];
$story_id = $_SESSION['selected_story_id'];


/* test echos 
echo " id: ";
echo $story_id;
echo " your rating: ";
echo $rate_value;
 
*/
 
//function save_rating($story_id, $rate_value) { 
    
    $query = "SELECT times_rated, total_rating FROM stories WHERE story_ID = '$story_id'";
    $result = mysql_query($query);
   
      
    $row = mysql_fetch_assoc($result);

    $totalrating = $row['total_rating'];
    $timesrated = $row['times_rated'];
    $newtotalrating = $totalrating + $rate_value;
    $timesrated++;
    
    echo "<p class='thanks'>You have rated this story.</p>";
    
    $update2 = "UPDATE stories SET total_rating = '$newtotalrating'"
               . " WHERE story_ID = '$story_id';";
    
    $update = "UPDATE stories SET times_rated = '$timesrated'"
               . " WHERE story_ID = '$story_id';";
   
   
    $result = mysql_query($update);
    $result = mysql_query($update2);
       

?>


