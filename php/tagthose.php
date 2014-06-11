<?php

session_start(); //Start session
include("db_connect.php"); //Connect to SQL

// this file gets the submitted tags from tagpage.html and adds them to database



function save_tag($story_id, $tag_name) { 

    // Try to load story_tags-row for this story_fk and tag name
    $query = "SELECT storyTags_ID, total_taggins FROM story_tags WHERE story_FK = '$story_id'"
            . " AND tag_FK = (SELECT tag_id FROM tags WHERE name = '$tag_name');";
    $result = mysql_query($query);
    $num_rows = mysql_num_rows($result);
    // Checks if the storytag already exists in the database. Update if it exists and creates a new if not.
	//echo $num_rows;
    if(mysql_num_rows($result)) { 
        $row = mysql_fetch_assoc($result);
        $storytags_id = $row['storyTags_ID'];
        $number_of_taggings = $row['total_taggins'];
        $number_of_taggings++;
            
        $update = "UPDATE story_tags SET total_taggins = '$number_of_taggings'"
                . " WHERE storyTags_ID = '$storytags_id';";
        $result = mysql_query($update);

	//mysql_free_result($result);
    }
    else {
        $insert = "INSERT INTO story_tags(story_FK, tag_FK, total_taggins) VALUES ('$story_id', "
                . "(SELECT tag_ID FROM tags WHERE name = '$tag_name'), 1);";
        $result = mysql_query($insert);
    }
}


$story_id = $_SESSION['selected_story_id'];
//echo "Thank You for adding categories!";

if(isset($_GET['tag_name'])){
    foreach($_GET['tag_name'] as $tag_name) {
        save_tag($story_id, $tag_name);
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="../css/main.css">
<html>
    <p class="thanks"> Thank you for adding categories!<p>
</html>    

    
