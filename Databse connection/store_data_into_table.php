<?php
$host="localhost";
$user="root";
$pass="";
$databaseName="pwad_batch-70";
$database=new mysqli($host,$user,$pass,$databaseName);
if($databse->connect_error){
    die("Connection Failed.".$databse->connect_error);
}echo "Connection successfully!";

if(isset($_POST['btnsubmit'])){
    $n=$_POST['name'];
    $a=$_POST['address'];
    $e=$_POST['email'];
    $p=$_POST['phone'];

    $databse->query("call add_data('$n','$a','$e','$p')");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Name</label><br>
        <input type="text" name="name"><br>
        <label for="">Address</label><br>
        <input type="text" name="address"><br>
        <label for="">Email</label><br>
        <input type="text" name="email"><br>
        <label for="">Phone Number</label><br>
        <input type="text" name="phone"><br>
        <input type="submit" name="btnsubmit" value="Submit">
    </form>

 
</body>
</html>