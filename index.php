<?php
session_start();  		// just in case

$_SESSION['genre'] ="all";  	// sets defaults for sorting
$_SESSION['sortby'] ="0";

?>


<!DOCTYPE html>
<!--
This file created by Iikka Paajala, Wangjing Zuo and Sami Pohjolainen
The application is created as a Project II course work in University of Oulu, Department of Information Processing Science.
Project members are Iikka Paajala, Wangjing Zuo, Sami Pohjolainen, Toni Tuominen, Antti Oikarinen, which all have helped in creation of the application.

This page uses styles.css
-->
<html>

    <head>
        <title>iUBI - Main Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/styles.css" rel="stylesheet" type="text/css">
        <link href="css/fonts.css" rel="stylesheet"  type="text/css" charset="utf-8" />
    </head>

<body id="home">
        
        <div id="wrapper">
            
       
        <div id="header_container"><header id="main_header">
        
           <h1 id="main_title">UBI STORIES</h1>
           <h2 id="main_sub-title">READ &#8226; RATE &#8226; TAG</h2>
            
        </header>
        </div>    
            
        <div id="main_content">
            
            <iframe id="main_frame_id" scrolling="no" height="600" width="930" src="img/ubikuva.jpg" name="MainFrame">
                
            </iframe>
            
        </div>
        
        <nav id="main_navigation">
            <ul class="ca-menu">
		<!-- 	Creates four buttons on the bottom of the page 
			First button is "main page" ie. opens ubikuva.jpg in the MainFrame as start screen.
			Second button shows the list (list_page.php) in mainframe (the middle part of the screen).
			Third button gives general information (info.html).
			Fourth button opens survey page from another web site.
		-->
                <li>
                    <a href="img/ubikuva.jpg" target="MainFrame">
                        <div class="ca-content">
                            <h2 class="ca-main">HOME</h2>
                            <h3 class="ca-sub">The main page</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="php/list_page.php" target="MainFrame">
                        <div class="ca-content">
                            <h2 class="ca-main">STORIES</h2>
                            <h3 class="ca-sub">Stories written by users</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="html/info.html" target="MainFrame">
                         <div class="ca-content">
                            <h2 class="ca-main">INFO</h2>
                            <h3 class="ca-sub">General information</h3>
                        </div>
                    </a>
                </li>
               <li>
                    <a href="https://ubiproject.typeform.com/to/zFMQ7T" target="MainFrame">
                        <div class="ca-content">
                            <h2 class="ca-main">SURVEY</h2>
                            <h3 class="ca-sub">Help University of Oulu</h3>
                        </div>
                    </a>
                </li>

            </ul>
        </nav>
        </div>
</body>
</html>
