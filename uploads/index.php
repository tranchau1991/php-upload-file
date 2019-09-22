<!DOCTYPE html>
<html>
	<title>List file before 5 day.
	</title>
<body>

<p>List file before 5 day.</p>
<?php


$files = array();
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && $file != "index.php") {
           $files[filemtime($file)] = $file;
        }
    }
    closedir($handle);

    // sort
    krsort($files);
    // find the last modification
    $reallyLastModified = end($files);
	echo '<ol>';
    foreach($files as $file) {
        $lastModified = date('F d Y, H:i:s',filemtime($file));
		//$start_date = strtotime("2018-06-08"); 
		//$end_date = strtotime("2018-09-19");
		$start_date = strtotime(date('Y d F',filemtime($file))); 
		$end_date = strtotime(date('Y d F')); 
		
		$sundate =($end_date - $start_date)/60/60/24;
	   if($sundate<5){
		//echo "<li>".$sundate."<td><a href=\"$file\" target=\"_blank\">$file</a></td><td> $lastModified</td></li>";
		echo "<li><td><a href=\"$file\" target=\"_blank\">$file</a></td><td> $lastModified</td></li>";
	   }
        //}
    }
	echo '</ol>';
}

?>
</body>
</html>
