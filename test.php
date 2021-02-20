<?php

$db_handle = pg_connect("host=ec2-3-214-3-162.compute-1.amazonaws.com dbname=d3urkvei1lanb1 user=rlmcybmaxecgds password=6d1ee81dc24beb6f2fdf158bea72ba96edc0e95b4a6f085dfc32cadb3cc61dea");

if ($db_handle) {

echo 'Connection attempt succeeded.';

} else {

   

echo 'Connection attempt failed.';

}

echo "<h3>Connection Information</h3>";

echo "DATABASE NAME:" . pg_dbname($db_handle) . "<br>";

echo "HOSTNAME: " . pg_host($db_handle) . "<br>";

echo "PORT: " . pg_port($db_handle) . "<br>";

echo "<h3>Checking the query status</h3>";

$query = "SELECT nom,prenom FROM admin";

$result = pg_exec($db_handle, $query);

if ($result) {

echo "The query executed successfully.<br>";

echo "<h3>Print First and last name:</h3>";

for ($row = 0; $row < pg_numrows($result); $row++) {

$firstname = pg_result($result, $row, 'nom');

echo $firstname ." ";

$lastname = pg_result($result, $row, 'prenom');

echo $lastname ."<br>";

}

} else {

echo "The query failed with the following error:<br>";

echo pg_errormessage($db_handle);

}

pg_close($db_handle);

?>