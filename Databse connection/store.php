<?php
$database=new mysqli("localhost","root","","pwad_batch-70");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $database->query("call add_data('$name','$address','$email','$phone')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    
</head>
<body>
    <form action="" method="post">
        <label for="">Name:</label><br>
        <input type="text" name="name" id=""><br>
        <label for="">Address:</label><br>
        <input type="text" name="address"><br>
        <label for="">Email:</label><br>
        <input type="text" name="email"><br>
        <label for="">Phone:</label><br>
        <input type="text" name="phone" name="phone" id="">
        <input type="submit" Value="Submit">
 <br>   </form>
</body>
</html>