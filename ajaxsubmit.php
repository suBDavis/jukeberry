<?php

$search=$_GET["search"];
//$artist=$_POST['artist'];
//$command=$_POST['command'];
//Insert query
//echo "sh /usr/share/nginx/www/juke/add.sh " . $search;
if(isset($_GET['playnum']) && isset($_GET['search'])){
	$result = shell_exec("echo ".$_GET['playnum']." > /usr/share/nginx/www/juke/sel");
	$result = shell_exec("sh /usr/share/nginx/www/juke/add.sh " . $_GET['search']);
	echo $result;
}
if(isset($_GET['playlist'])){
	$res2 = shell_exec("cat juke/list");
	echo $res2;
}
if(isset($_GET["volume"])){
	if ($_GET['volume'] == 1) $result = shell_exec("echo \"volume 1\" > /tmp/fifo\n");
	else $result = shell_exec("echo \"volume -1\" > /tmp/fifo\n");
	echo $result;
}
if (isset($_GET['search']) && isset($_GET['gs']) && (strlen($_GET['search']) >= 2)){
	echo "<pre>";
	shell_exec("sh /usr/share/nginx/www/juke/search.sh " . $_GET['search']);
	$result = shell_exec("cat /usr/share/nginx/www/juke/searchOut");
	echo $result."</pre>";
}
if (isset($_GET['search']) && isset($_GET['yt']) && (strlen($_GET['search']) == 11)){
	echo "<pre>youtube search";
	$result = shell_exec("echo youtube > /usr/share/nginx/www/juke/sel");
	$result = shell_exec("sh /usr/share/nginx/www/juke/add.sh " . $_GET['search']);
	echo $result;
}
if(isset($_GET['playpause'])){
        $result = shell_exec("echo \"pause\" > /tmp/fifo\n");
        echo $result;
}
if(isset($_GET['skip'])){
        $result = shell_exec("echo \"q\" > /tmp/fifo\n");
        echo $result;
}
?>
