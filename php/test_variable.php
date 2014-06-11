
<?php
/* by Sami Pohjolainen and Antti Oikarinen. This page is needed, it does unsets the session variable for a selected story
after it has been displayed */
session_start();
if(isset($_POST['par_row_id']))
{
    unset($_SESSION['selected_story_id']);
    $_SESSION['selected_story_id'] = $_POST['par_row_id'];
}
?>
