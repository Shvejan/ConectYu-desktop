<?php
//download file
if(isset($_GET['downloadfiles'])){
	global $con;
	$filename=basename($_GET['file_name']);
	$filepath="../uploadedFiles/$filename";
	if(!empty($filename) and file_exists($filepath)){
		header("Cache-Control: public");
		header("Content-Description: FIle Transfer");
		header("Content-Disposition: attachment; filename=$filename");
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");
		
		readfile($filepath);
		exit;
	}
}
?>