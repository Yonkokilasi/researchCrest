<?php
date_default_timezone_set("GMT");
include("../../connect.php");
include("../../session.php");

if (isset($_POST['submit_sample'])) {
	
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
$topic   		   = mysqli_real_escape_string($Con, $_POST['topic']);
$meta          = mysqli_real_escape_string($Con, $_POST['meta']);
$pages         = mysqli_real_escape_string($Con, $_POST['pages']);
$urgency   		 = mysqli_real_escape_string($Con, $_POST['urgency']);
$level   		   = mysqli_real_escape_string($Con, $_POST['level']);
$subject   	   = mysqli_real_escape_string($Con, $_POST['subject']);
$style         = mysqli_real_escape_string($Con, $_POST['style']);
$sources       = mysqli_real_escape_string($Con, $_POST['sources']);
$content       = mysqli_real_escape_string($Con, $_POST['content']);
$sample_url    = slug(mysqli_real_escape_string($Con, $_POST['url']));
$time          = date('Y-m-d H:i:s');

$sql = ("INSERT INTO `samples` (`id`, `topic`, `meta`, `pages`, `urgency`, `level`, `subject`, `style`, `sources`, `content`, `sample_url`, `time`) VALUES (NULL, '$topic', '$meta', '$pages', '$urgency', '$level', '$subject', '$style', '$sources', '$content', '$sample_url', '$time')");

$query=mysqli_query($Con, $sql) or mysql_error();

 if ($query) {

    mysqli_query($Con,"COMMIT");

    $_SESSION['msg']="samples has been successfully posted...";
    header("location:../../samples.php");

 } else {        
      mysqli_query($Con,"ROLLBACK");
      
    $_SESSION['msg']="An error occured during processing, please try again...";
    header("location:../../samples.php");
  }

  mysqli_close($Con);

} else{


	$_SESSION['msg']="please use the submit button...";
    header("location:../../samples.php");
}






?>