<?php
$db=new mysqli("localhost","root","","pwad_batch-70"); 
//record delete operation
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $db->query("delete from students where id='$id'");
    header('location: tableView.php');
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
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                <?php
                $db=new mysqli("localhost","root","","pwad_batch-70");

                $all_info=$db->query("select * from students");
                while(list($id,$name,$email,$contact,$address)=$all_info->fetch_row()){
                    echo "<tr>
                                <td>$id</td>
                                <td>$name</td>
                                <td>$email</td>
                                <td>$contact</td>
                                <td>$address  </td>                              

                                <td>
                                    <a href='updateTable.php?update_id=$id' class='btn btn-dark'>Update</a>
                                    <a href='tableView.php?delete_id=$id' class='btn btn-danger'>Delete</a>
                                </td>
                    </tr>";
                }
                ?>
            </table>
              
           
        </div>

    </div>
    </div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</body>
</html>