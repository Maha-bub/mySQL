
<?php
$db=new mysqli("localhost","root","","mahabub_70");
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];

    $tabledata="INSERT INTO Information (id,name,email,contact) values('$id','$name','$email','$contact')";
    if(mysqli_query($db,$tabledata)==true){
        echo "Data input Success!";
        header("location:table.php");
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
    <div class="container">
        <h3 class="heading text-center my-3 text-primary  fw-bold">
            Please fil-up the form
        </h3>
        <form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label fw-bold">ID</label>
    <input type="id" name="id" class="form-control" id="id" aria-describedby="idHelp">
      </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label fw-bold">Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label fw-bold">Email</label>
    <input type="text" name="email" class="form-control " id="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label fw-bold">Contact</label>
    <input type="text" name="contact" class="form-control" id="contact">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary fw-bold">Submit</button>
</form>
    </div>

    </body>
</html>