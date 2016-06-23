<?php
/*
get bday for next month 
*/
 
$dir = 'sqlite:db/bdays';
$dbh = new PDO($dir) or die("cannot open database");
$month = date("m-d", strtotime("+1 month", mktime()));
$now = date("m-d", mktime());
$query = "SELECT name,substr(date,6) as date FROM bdays where substr(date,6)<='".$month."' and substr(date,6)>'".$now."'";
foreach ($dbh->query($query) as $row) {
	$rows[]=$row;
}
echo json_encode($rows);
?>

