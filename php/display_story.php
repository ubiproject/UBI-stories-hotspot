<!--opens a story in a popup

this file comes from sort.php via function and ajax and list_page.php.
In list_page.php there is window divided in two. This is the upper part.

-->

<html lang="en">
    <head>
        <meta charset="UTF-8">        
        <title>UBI Stories - Display Story</title>
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link href="../css/fonts.css" rel="stylesheet"  type="text/css" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
</html>


<?php

session_start();
require_once('db_connect.php');

$parameter_story_id = $_SESSION['selected_story_id'];
$sql = "SELECT * FROM stories where story_ID='$parameter_story_id'";

$query = mysql_query($sql);
        
    if($query === FALSE){
        die(mysql_error());
        }
           
    $row = mysql_fetch_array($query);

    echo "<h1 id='story_head'>".$row['name']."<h1>";
    echo "<hr>";
    

    $text=$row['body_text'];               
    $chars = 60; // Number of characters per row
    $newtext = wordwrap($text,$chars,"<br>");
    $text_in_rows = $newtext;
    $page_size = 10; // Number of rows per page
    $amount = substr_count($text_in_rows,"<br>")+1; //amounts of rows in a story +1 needed for last row
    $splittext = explode("<br>", $newtext);

    $lines = $splittext; # This is your text file.
    $line_amount = $amount;
    $perpage = $page_size; #This number specified how many lines to show on a page.
    //echo $perpage;

    // Echoes different lines on each paginated page.
    $p = isset($_GET['p']) ? $_GET['p'] : 1;
    for ($i = (($p * $perpage) - $perpage); $i <= (($perpage * $p) - 1); $i++){
        if($i >= $line_amount){
            break;
        }
        else{
            if($lines[$i] != ''){
                echo ''.$lines[$i]." <br>"; # This is the output loop.
            }
        }
    }

    // Creates table for pagination functions
    ?>
    <?php

    $total_pages = $line_amount/$perpage;
    if($line_amount % $perpage != 0){
        $total_pages = $total_pages + 1;
    }

    $text_string = '';
    if($p!=1)
    {
      $back_page=$p-1;
         $text_string .= "<a class='btn' href='?p=$back_page'><button class='btn_prev' type='button'>previous page</button></a>";
    }
    else
    {
        $back_page=$p-1;
        $text_string .= "";
    }

    if($p <= $total_pages - 1){
        $next_page=$p+1;
        $text_string .= "<a class='btn' href='?p=$next_page'><button class='btn_next' type='button'>next page</button></a>";    
    }
    else
    {
        $text_string .= "";
    }
    
    echo "<div class='position_btn_story'>". $text_string. "</div>";
    ?>
    </html>
                 
<?php  
    // logic for adding the number of views, OUT Of ORDER, counts views at least twice on every display time
    $timesopened = $row['no_views'];
    $timesopened++;
    $update = "UPDATE stories SET no_views = '$timesopened'"
    . " WHERE story_ID = '$parameter_story_id';";
    $query = mysql_query($update);
    $timesopened="null";

                   
?>
           
                    
                    
                    
                    
        
