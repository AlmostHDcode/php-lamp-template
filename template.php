<?php
$page_admin = false; //used to check if this page is open to all who are logged in, or admin only
$browser_title = "PHP Fullstack | Dashboard"; //used in <title></title>
$page_header = 'Dashboard'; //used as the 
$custom_styles = []; //add path to custom extra css needed for this page to this array
$custom_srcs = []; //add path to custom extra js needed in the <head> for this page to this array
require_once("/path/to/your/base/directory/env.php"); //the file that defines all constants and has env vars for mysql
require_once(PAGE_INIT); //start output buffer, create the head and body and beginning divs to hold page data
?>

<?php
/* All page content goes here */
?>

<?php require_once(PAGE_END); //ends the divs created in PAGE_INIT, creates the footer ?>

<script>
    /* any inline js or external js links needed for this page should go here */
</script>

<?php require_once(HTML_END); //ends the body and html, close the output buffer ?>
