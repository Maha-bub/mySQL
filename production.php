<?php
$database = new mysqli("localhost", "root", "", "mahabub_70");

if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $result = $database->query("CALL manufacturer_info('$name','$address','$contact')");

    if (!$result) {
        die("Error: " . $database->error);
    } else {
        echo "Inserted Successfully";
    }

    while($database->more_results() && $database->next_result()) {;}
}

 if(isset($_POST['add_submit'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $man_id = $_POST['m_id'];
    $database->query("call product_info('$name','$price','$man_id')");
 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <title>Details of a Manucaturer and products</title>
</head>
<body>
    <div>
        <h2>Manufacturer and Product Details:</h2>
        <fieldset><legend><h3>Add Manucaturer</h3></legend>
    <form action=""  method="POST">
        Name: <br>
        <input type="text" name="name"><br>
        Address: <br>
        <input type="text" name="address"> <br> <br>
        Contact: <br>
        <input type="text" name="contact"> <br> <br>
        <input type="submit" name="submit" value="Submit">
    </form></fieldset>


    <form action="" method="post">
        <fieldset>
            <h1>
                Add Products
            </h1>
            Name: <br> 
            <input type="text" name="name"> <br> <br>
            Price: <br>
            <input type="text" name="price"> <br> <br>
            Man_id: <br> 
            <select name="m_id" id="">
                <?php
                $manufac = $database->query("select * from manufacturer");
                while(list($_mid , $_uname) = $manufac->fetch_row()){
                    echo "<option value='$_mid'> $_uname </option>";
                }
                ?>
            </select>
            <input type="submit" name="add_submit" value="Submit">
        </fieldset>
     </form>



      <table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        $manufac = $database->query("SELECT * FROM manufacturer_view");

        while(list($_mid, $_uname, $price) = $manufac->fetch_row()){
        ?>
            <tr>
                <td><?php echo $_mid; ?></td>
                <td><?php echo $_uname; ?></td>
                <td><?php echo $price; ?></td>
                
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


    </div>
    <div></div>
    <div></div>
</body>
</html>