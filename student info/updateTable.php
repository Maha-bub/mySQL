<?php
$database=new mysqli("localhost","root","","pwad_batch-70");
   $old_id="";
    $old_name="";
    $old_email="";
    $old_contact="";
    $old_address="";


if($_GET['update_id']){
    $id=$_GET['update_id'];
    $dataQuery=$database->query("SELECT * FROM students where id='$id'");
    // $record_Info=mysqli_fetch_row($dataQuery);
$record_Info = $dataQuery->fetch_assoc();
// 
    $old_id=$record_Info['id'];
    $old_name=$record_Info['name'];
    $old_email=$record_Info['email'];
    $old_contact=$record_Info['contact'];
    $old_address=$record_Info['address'];
    // $record_Info = $dataQuery->fetch_assoc();

    //(Store old data from pwad_batch-70 database inside students table)
//     $old_id=$record_Info['0'];
//     $old_name=$record_Info['1'];
//     $old_email=$record_Info['email'];
//     $old_contact=$record_Info['contact'];
//     $old_address=$record_Info['address'];
// }

}

  if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    $updateQuery = "UPDATE students 
                    SET name='$name', email='$email', contact='$contact', address='$address' 
                    WHERE id='$id'";

    if($database->query($updateQuery)){
        header("Location:updateTable.php");
        exit();
    } else {
        echo "Update failed! " . $database->error;
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
       
        <input type="hidden"  name="id" value="<?php echo $old_id?>" required>
        <label for="name">Name:</label>
        <input type="text"    name="name" value="<?php echo $old_name?>" required>

        <label for="email">Email:</label>
        <input type="email"  name="email" value="<?php echo $old_email?>"  required>

        <label for="contact">Contact:</label>
        <input type="text"  name="contact" value="<?php echo $old_contact?>"  required>

        <label for="address">Address:</label>
        <textarea id="address" name="address" rows="4" value= "<?php echo $old_address ?>"></textarea>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>