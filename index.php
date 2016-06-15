<?php
/*
get bday for next month 
*/
 
$dir = 'sqlite:db/bdays';
$dbh = new PDO($dir) or die("cannot open database");
$month = date("m-d", strtotime("+1 month", mktime()));
$query = "SELECT name,substr(date,6) as date FROM bdays where substr(date,6)>='".$month."' ";
foreach ($dbh->query($query) as $row) {
	echo json_encode($row);
}
?>

