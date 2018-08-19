<?php
date_default_timezone_set("GMT");
include("../../connect.php");
include("../../session.php");

if (isset($_POST['submit_blog'])) {
	
//function
function slug($string, $spaceRepl = "-") {
// Replace "&" char with "and"
$string = str_replace("&", "and", $string);
// Delete any chars but letters, numbers, spaces and _, -
$string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);
// Optional: Make the string lowercase
$string = strtolower($string);
// Optional: Delete double spaces
$string = preg_replace("/[ ]+/", " ", $string);
// Replace spaces with replacement
$string = str_replace(" ", $spaceRepl, $string);
return $string;
}
//function

$blog_title   		 = mysqli_real_escape_string($Con, $_POST['blog_title']);
$meta_description  = mysqli_real_escape_string($Con, $_POST['meta_description']);
$header   			   = mysqli_real_escape_string($Con, $_POST['header']);
$blog_url   		   = slug(mysqli_real_escape_string($Con, $_POST['blog_url']));
$blog_content   	 = mysqli_real_escape_string($Con, $_POST['blog_content']);
$time       		   = date('Y-m-d H:i:s');


$sql = ("INSERT INTO `blogs` (`id`, `blog_title`, `meta_description`, `header`, `blog_url`, `blog_content`, `time`, `show`) VALUES (NULL, '$blog_title', '$meta_description', '$header', '$blog_url', '$blog_content', '$time', 'no')");

$query=mysqli_query($Con, $sql) or mysql_error();

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="blog has been successfully posted...";
    header("location:../../blog.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again...";
    header("location:../../blog.php");
  }

  mysqli_close($Con);

} else{


	$_SESSION['msg']="please use the submit button...";
    header("location:../../blog.php");
}






?>