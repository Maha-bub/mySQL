<?php
$db=new mysqli("localhost","root","","mahabub_70");
if(isset)


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
        <h3 class="heading">
            Please fil-up the form
        </h3>
        <form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ID</label>
    <input type="id" name="id" class="form-control" id="id" aria-describedby="idHelp">
      </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Contact</label>
    <input type="text" name="contact" class="form-control" id="contact">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
    </div>




    <div class="container">
        <div class="row">
            
            <table class="table table-success table-striped">
                <div class="d-flex justify-content-center align-items-center" style="">
    <h3>Student Table</h3>
</div>

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
                <?php
                $u=$db->query("select * from Information");
                while(list($id,$name,$email,$contact)=$u->fetch_row()){
                    echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$email</td>
                    <td>$contact</td>
                    
                    </tr>";
                }
                ?>
  ...
</table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</body>
</html>