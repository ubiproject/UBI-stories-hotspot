<!DOCTYPE html>
<!--
This is the frame which shows list of stories with links and ratings.

The information is received from the genre and sort buttons either as string 
(genre name) or sort value (number).

-->
<html lang="en">
    <head>
        <meta charset="UTF-8">        
        <title>ubistories</title>
        <link rel="stylesheet" href="../css/main.css">
        <link href="../css/fonts.css" rel="stylesheet"  type="text/css" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/sunny/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <!--jquery to connect between button and popup from parent file-->
    </head>
            <script>

            $(function() {
                $(".popuptest").click(function() {
                    
                    var row_id = $(this).attr("id");
               
                    
                 putToAjax(row_id);
                 
                 accessParent();
                });
            });
            
            
            function putToAjax(row_id){
                    $.ajax({
                        type: "POST",
                        url: 'test_variable.php',
                        data: { par_row_id: row_id },
                    }); 
            }
            
            function accessParent() {
                parent.showPopup();      
            }
        </script>
        
  
      
</html>


<?php
	session_start();
	require_once('db_connect.php');


	// checks whether value is string or digit and 
	// sends forward either sortby or genre variable
	if(ctype_digit($_GET['sort_value'])){
  
    		$_SESSION['sortby'] = $_GET['sort_value'];
    		createQueryString();
	} 
	else{
		$_SESSION['genre'] = $_GET['sort_value'];
		createQueryString();
    	}

  
	$genre =$_SESSION['genre'];
	$sortby =$_SESSION['sortby'];


// How many rows in a list page
	$page_size = 5; 

// Gets the number of rows in the query for a list page
	$sql2= "SELECT COUNT(*) from stories, story_tags, tags where stories.story_id = story_tags.story_fk and story_tags.tag_fk = tags.tag_id and tags.name = '$genre'";
	$result = mysql_query($sql2);
	$row1 = mysql_fetch_row($result);
	$amount = $row1[0]; 

// Creates the paging based on the number of rows
	if( $amount ){
		if( $amount < $page_size ){ $page_count = 1; }               
   			if( $amount % $page_size ){                                  
       				$page_count = (int)($amount / $page_size) + 1;           
	   		}else{
       				$page_count = $amount / $page_size;                      
   			}
		}
		else{
	   		$page_count = 0;
}

// Gets the page number from url
	if( isset($_GET['page']) ){
   		$page = intval( $_GET['page'] );
   	}
	else{
		$page = 1;
   	} 

	$test = intval($_GET['sort_value']);

// Logic for previous and next pages
	$page_string = '';
	if( $page == 1 ){
		$page_string .= '<a class="btn" disabled></a>';
	}
	else{
   		$page_string .= '<a class="btn" href=?page='.($page-1).'&sort_value='.($test).'><button class="btn_prev" type="button">previous page</button></a>';
	}
	if( ($page == $page_count) || ($page_count == 0) ){
   		$page_string .= '<a class="btn" disabled></a>';
	}
	else{
		$page_string .= '<a class="btn" href=?page='.($page+1).'&sort_value='.($test).'><button class="btn_next" type="button">next page</button></a>';
	}

	if($amount){

			// command for searching from the database. Should include everything needed
		$sql = "SELECT stories.* FROM stories, story_tags, tags WHERE stories.story_ID = story_tags.story_FK AND story_tags.tag_FK = tags.tag_ID AND tags.name = '$genre' ORDER BY $sortby LIMIT ". ($page-1)*$page_size .", $page_size";

		$query = mysql_query($sql);
        
            	if($query === FALSE){
                	die(mysql_error());
                }
      		
		echo"<table id='story_lists'>";
            
            	while($row = mysql_fetch_array($query))
                	{
                	$rowset[] = $row1;
                	$story = $row['story_ID'];
                	$stars = 0;
				
			if($row['times_rated'] >0){   // displays rating as stars
							
				$stars = round($row['total_rating'] / $row['times_rated']);  
			}
                
			$stars_string = "";
                
			for($x=0; $x < $stars; $x++)
                	{
                    		$stars_string .= "*";
	                }
                
               
                
                echo "<tr id='$story' class='popuptest'>";
                echo "<td id='table_cell'>" . $row['name'] . "</td>";
                
                echo "<td id='table_cell1'>" . $stars_string .  "</td>";  
                
                
                 
                
                    echo "</tr>";
                }
                
               
                echo "</table>";
                echo "<div class='position_btn_list'>". $page_string . "</div>";
		} 

		else {
			$rowset = array();
		}
                
                
function createQueryString(){
    // this function uses the variable to sort the list of stories
    switch($_SESSION['sortby']){
        case 0:
            $_SESSION['sortby']="total_rating / times_rated DESC";
        break;
    
        case 1:
            $_SESSION['sortby']="no_views DESC";
        break;
    
        case 2:
            $_SESSION['sortby']="when_created DESC";
        break;
    
        case 4:
            $_SESSION['sortby']="name ASC";
        break;
     
    }
}

?>
