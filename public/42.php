<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

echo $url.'</br>';
echo $host.'</br>';
echo $username.'</br>';
echo $password.'</br>';
echo $database.'</br>';
?>