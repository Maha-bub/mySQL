<?php
$database=new mysqli("localhost","root", "","pwad_batch-70");
if(isset($_POST['insert'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];

    $queryInsert="INSERT INTO students (name,email,contact,address) values('$name','$email','$contact','$address')";

    //(Alternative way to data insert oop practice for good practice)

    //  if($database->query($queryInsert)){
    //     header("Location: view.php");
    //     exit();

    if(mysqli_query($database,$queryInsert)==true)//(procedural and oop mix for data insert)
        {
       header("location: view.php");
        exit();
    }
    else{
        echo "Data not inserted!".mysqli_error($database);
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Information Form</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h2>Student Information Form</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <button type="submit" name="insert">Submit</button>
    </form>
</body>
</html>