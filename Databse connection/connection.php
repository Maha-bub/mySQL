<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection mySQL to the database</title>
</head>
<body>
    <h2>Connecting local server :</h2>
</body>
</html>

<?php
$host="localhost";
$user="root";

$pass="";
$database="pwad_batch-70";

$conn=new mysqli($host,$user,$pass,$database);

if($conn->connect_error){
    die("Connection Failed.".$conn->connect_error);
}echo "Connection successfully!";
?>