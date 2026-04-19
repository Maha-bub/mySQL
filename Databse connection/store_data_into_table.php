<?php
$host="localhost";
$user="root";
$pass="";
$databaseName="pwad_batch-70";
$databse=new mysqli($host,$user,$pass,$databaseName);
// if($databse->connect_error){
//     die("Connection Failed.".$databse->connect_error);
// }echo "Connection successfully!";

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

    <table>
<tr>
    <th>Id</th>
    <th>Name</th>
    <th>address</th>
    <th>Email</th>
    <th>Phone</th>
</tr>
</table>

 <?php
  $show=$database->query("select*from SHOW_DATA");
  while (list($id,$name,$address,$email,$phone)=$show->fetch_row()) {
    echo "
    <tr>
<td>$id</td>
<td>$name</td>
<td>$address</td>
<td>$email</td>
<td>$phone</td>
</tr>"};
</div>
</body>
</html>