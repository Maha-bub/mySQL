<?php
$db=new mysqli("localhost","root","","mahabub_70"); 
if($_GET['update_id']){
    $id=$_GET['update_id'];
    $query=$db->query("select * from information where id='$id'");
    $result=mysqli_fetch_assoc($query);


    //update data table records
    $u_id=$result['id'];
    $u_name=$result['name']; 
    $u_email=$result['email'];
    $u_contact=$result['contact'];

}

if(isset($_POST['update_submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $query="UPDATE information SET name='$name', email='$email', contact='$contact' WHERE id='$id'";


    if(mysqli_query($db,$query)==true){
        echo "Data input Success!";
        header("location:table.php".$_SERVER['PHP_SELF']);
    exit();
    }
    else{
        "Data not inserted". mysqli_error($db);
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table show_source</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
</head>
<body>
    <div class="container mt-5">
        <h3 class="heading text-center my-3 text-secondary  fw-bold">
           Update Data
        </h3>
        <form action="" method="POST">
  <div class="mb-3">
    
    <input type="id" name="id" class="form-control" value="<?php echo $u_id ?>" hidden id="id" aria-describedby="idHelp">
      </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label fw-bold">Name</label>
    <input type="text" name="name" value="<?php echo $u_name ?>" class="form-control" id="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label fw-bold">Email</label>
    <input type="text" name="email" value="<?php echo $u_email ?>" class="form-control " id="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label fw-bold">Contact</label>
    <input type="text" name="contact" value="<?php echo $u_contact ?>" class="form-control" id="contact">
  </div>



  
  <button type="submit" name="update_submit" class="btn btn-primary fw-bold">Update</button>
</form>
    </div>

    </body>
</html>