<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File Uploader</title>
<link href="upload/css/reset.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#main_container{
	font-size: 1.4em;
	margin: 10px;
	font: 100% Tahoma, Arial, sans-serif;
}
h2 {
	font-size: 2em;
	padding-bottom: 20px;
}
</style>

<link href="upload/css/ui-lightness/jquery-ui-1.8.14.custom.css" rel="stylesheet" type="text/css" />
<link href="upload/css/fileUploader.css" rel="stylesheet" type="text/css" />

<script src="upload/js/jquery-1.6.2.min.js" type="text/javascript"></script>
<script src="upload/js/jquery-ui-1.8.14.custom.min.js" type="text/javascript"></script>
<script src="upload/js/jquery.fileUploader.js" type="text/javascript"></script>

</head>

<body>
<div id="main_container">
	<form action="upload/upload.php?id=<?=$orderId?>&file_addr=<?=$file_addr?>" method="post" enctype="multipart/form-data">
		<input type="file" name="userfile" class="fileUpload" multiple>
		<div> 
			<select name="description" class = "form-control2" required="required"> 
				<option>please select description...</option>
				<option>Order Instructions</option>
				<option>Guidelines for writing</option>
				<option>Outline</option>
				<option>My draft</option>
				<option>Sample of a paper</option>
				<option>Article to be used</option>
				<option>eBook</option>
				<option>paper with comments for revision</option>
				<option>Proposal</option>
				<option>Plagiarism report</option>
				<option>Payment reciept</option>
				<option>Completed Paper</option>
				<option>Revised Paper</option>
				<option>Source/Material</option>
				<option>Plagiarism Report</option>
				<option>Other..</option>
			</select> 
		</div> 
		<button id="px-submit" type="submit">Upload</button>
		<button id="px-clear" type="reset">Clear</button>
	</form>
	<script type="text/javascript">
		jQuery(function($){
			$('.fileUpload').fileUploader();
		});
	</script>
</div>
</body>
</html>