<?php
$db=new mysqli("localhost","root","","mahabub_70"); 
//record delete operation
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $db->query("delete from Information where id='$id'");
    header("location:table.php");
}
?>


<?php
$database
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
        <div class="row">
            
            <table class="table table-success table-striped">
                <div class="d-flex justify-content-center align-items-center" style="">
                 <h3>Student Table</h3>


                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
                <?php
                $db=new mysqli("localhost","root","","mahabub_70");

                $u=$db->query("select * from Information");
                while(list($id,$name,$email,$contact)=$u->fetch_row()){
                    echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$contact</td>
                    <td><a href='table.php?delete_id=$id' class='btn btn-danger'>Delete</a></td>
                    </tr>";
                }
                ?>
            </table>
                    <a href="insert.php" >
                        <button type="button" class="btn btn-primary">Insert</button>
                    </a>
           
        </div>

    </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</body>
</html>