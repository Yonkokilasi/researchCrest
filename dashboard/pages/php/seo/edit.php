<?php
date_default_timezone_set("GMT");
include("../../connect.php");
include("../../session.php");

$id = $_GET['id'];

if (isset($_POST['submit_seo'])) {
	
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
$page_column       = mysqli_real_escape_string($Con, $_POST['page_column']);
$url_name     = mysqli_real_escape_string($Con, $_POST['url_name']);
$meta         = mysqli_real_escape_string($Con, $_POST['meta']);
$title        = mysqli_real_escape_string($Con, $_POST['title']);
$header_1     = mysqli_real_escape_string($Con, $_POST['header_1']);
$header_2     = mysqli_real_escape_string($Con, $_POST['header_2']);
$content_1    = mysqli_real_escape_string($Con, $_POST['content_1']);
$content_2    = mysqli_real_escape_string($Con, $_POST['content_2']);
$content_3    = mysqli_real_escape_string($Con, $_POST['content_3']);
$content_4    = mysqli_real_escape_string($Con, $_POST['content_4']);
$url          = slug(mysqli_real_escape_string($Con, $_POST['url']));
// $time       		   = date('Y-m-d H:i:s');

  $sql = ("UPDATE `seo` 
  SET             `seo`.page_column     = '$page_column',
                  `seo`.url_name   = '$url_name',
                  `seo`.meta       = '$meta',
                  `seo`.title      = '$title',
                  `seo`.header_1   = '$header_1',
                  `seo`.header_2   = '$header_2',
                  `seo`.content_1  = '$content_1',
                  `seo`.content_2  = '$content_2',
                  `seo`.content_3  = '$content_3',
                  `seo`.content_4  = '$content_4'
  WHERE           `seo`.id         = '$id' ");


$query=mysqli_query($Con, $sql) or mysql_error();

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="sample has been successfully updated...";
    header("location:../../seo.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again...";
    header("location:../../seo.php");
  }

  mysqli_close($Con);

} else{

	$_SESSION['msg']="please use the submit button...";
    header("location:../../seo.php");
}

?>