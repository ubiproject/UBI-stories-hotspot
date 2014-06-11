<html>

    <head>
        <title>List of ubi stories</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		<link href="../css/fonts.css" rel="stylesheet"  type="text/css" charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/flick/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<!-- This is the first list page-->

    <!-- Popup winodow used by Jquery UI dialog function-->
        
    </head>
    
    <body>
        <!-- Contents of popup window-->
        <div id="storyframe">
            <!-- Content of child popup-->
            <div id="tagframe" title="Tagging">
				<!-- Size of the tagging popup frame-->	
                <iframe  src="../html/tag_page.html" height="150" width="600" frameborder="0" scrolling="no">
                </iframe>
            </div>
            <!-- Jquery that hidding the popup window before call it-->
            <script type="text/javascript"> // hide the popup window contents before call it
                $("#tagframe").hide();
            </script>
            <!--creates the two part popup, upper is for the story and below is rating part -->
            <div id="storypopup">
				<!-- Size of the story text popup frame inside the main popup called with showPopup() function -->	
                <iframe src="display_story.php" height="477" width="890"  frameborder="0" scrolling="no"></iframe>
                <!-- Size of the rating opup frame inside the main popup called with showPopup() function -->	
				<iframe id="ratethis_frame" src="add_rating.php" height="33" width="890" name="rateframe" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
        <script type="text/javascript"> // hide the popup window contents before call it
            $("#storyframe").hide();
        </script>
        
        <!--story list and categories :    creates two iframes in the MainFrame-->
        <div id="samis_frame"> 
               
            <!--list of stories-->
            <iframe id="content_iframe" src="sort.php?sort_value=all" name="sort_menu" frameborder="0" scrolling="no">
            </iframe>  
            
            <!--sorting bar-->
            <iframe id="listmenu_iframe" src="../html/sort_frame.html" name="sort_menu1" frameborder="0" scrolling="no">
            </iframe>
            
        </div>
    </body>
    <!-- using the Jquery UI dialog to create the story popup window -->
    <script>
        function showPopup(){
            $("#storyframe").dialog({
                width: 920, // Width of the whole popup
                height: 600, // Heights of the whole popup                
                padding:0,
                margin:0,
                buttons:{ //Button of popup window including close and open the child popup window
                    Tagging:{
                        text: 'Add Categories',
                      
                        click: function(){
                            $("#tagframe").dialog({ // Create the button which can be open a child popup window to show the multi choice categories 
                                position:['bottom', 280],
                                width: 650,
                                height: 270,
                                buttons:{
                                    Close:function(){
                                   
                                    text: 'Close',
                                    $(this).dialog("destroy");
                               }
                           }
                           });
                       }
               
                   },
                   Close:function(){
                       text: 'Close',
                       $(this).dialog("destroy");        
                    }
               },
               
               
               /*coool effect when closing the popup
		show:{
                   effect: "blind",
                   duration: 600
               },
               hide:{
                   effect: "explode",
                   duration: 600
               }
		*/
            });
        } 
        
        </script>    
</html>
