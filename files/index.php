<?php
$database = new mysqli("localhost", "root", "", "mahabub_70");

if ($database->connect_error) {
    die("Connection failed: " . $database->connect_error);
}

$notice = '';

if (isset($_POST['submit'])) {
    $name    = htmlspecialchars(trim($_POST['name']));
    $address = htmlspecialchars(trim($_POST['address']));
    $contact = htmlspecialchars(trim($_POST['contact']));

    $stmt = $database->prepare("CALL manufacturer_info(?, ?, ?)");
    $stmt->bind_param("sss", $name, $address, $contact);

    if ($stmt->execute()) {
        $notice = '<div class="notice success">✓ Manufacturer added successfully.</div>';
    } else {
        $notice = '<div class="notice error">✗ Error: ' . $database->error . '</div>';
    }
    $stmt->close();
    while ($database->more_results() && $database->next_result()) {;}
}

if (isset($_POST['add_submit'])) {
    $name   = htmlspecialchars(trim($_POST['name']));
    $price  = htmlspecialchars(trim($_POST['price']));
    $man_id = htmlspecialchars(trim($_POST['m_id']));

    $stmt = $database->prepare("CALL product_info(?, ?, ?)");
    $stmt->bind_param("sss", $name, $price, $man_id);

    if ($stmt->execute()) {
        $notice = '<div class="notice success">✓ Product added successfully.</div>';
    } else {
        $notice = '<div class="notice error">✗ Error: ' . $database->error . '</div>';
    }
    $stmt->close();
    while ($database->more_results() && $database->next_result()) {;}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manufacturer & Products</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">

    <!-- Header -->
    <div class="page-header">
        <h2>Inventory Manager</h2>
        <p>Manufacturers &amp; Products</p>
    </div>

    <!-- Notice -->
    <?php echo $notice; ?>

    <!-- Two Forms Side by Side -->
    <div class="grid">

        <!-- Add Manufacturer -->
        <div class="card">
            <div class="card-title">Add Manufacturer</div>
            <form action="" method="POST">
                <div class="field">
                    <label for="man-name">Name</label>
                    <input type="text" id="man-name" name="name" placeholder="e.g. Acme Corp" required>
                </div>
                <div class="field">
                    <label for="man-address">Address</label>
                    <input type="text" id="man-address" name="address" placeholder="e.g. 12 Main St, Dhaka" required>
                </div>
                <div class="field">
                    <label for="man-contact">Contact</label>
                    <input type="text" id="man-contact" name="contact" placeholder="e.g. +880 1700 000000" required>
                </div>
                <button type="submit" name="submit" class="btn">Add Manufacturer</button>
            </form>
        </div>

        <!-- Add Product -->
        <div class="card">
            <div class="card-title">Add Product</div>
            <form action="" method="POST">
                <div class="field">
                    <label for="prod-name">Product Name</label>
                    <input type="text" id="prod-name" name="name" placeholder="e.g. Wireless Mouse" required>
                </div>
                <div class="field">
                    <label for="prod-price">Price (BDT)</label>
                    <input type="text" id="prod-price" name="price" placeholder="e.g. 1200" required>
                </div>
                <div class="field">
                    <label for="prod-mid">Manufacturer</label>
                    <div class="select-wrapper">
                        <select id="prod-mid" name="m_id" required>
                            <option value="" disabled selected>Select a manufacturer</option>
                            <?php
                            $manufac = $database->query("SELECT * FROM manufacturer");
                            while (list($_mid, $_uname) = $manufac->fetch_row()) {
                                echo "<option value='$_mid'>$_uname</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="add_submit" class="btn">Add Product</button>
            </form>
        </div>

    </div><!-- /.grid -->

    <!-- Products Table -->
    <div class="table-card">
        <div class="table-card-header">Product Overview</div>
        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $view = $database->query("SELECT * FROM manufacturer_view");
                if ($view && $view->num_rows > 0) {
                    while (list($_mid, $_uname, $price) = $view->fetch_row()) {
                        echo "<tr>
                                <td>$_mid</td>
                                <td>$_uname</td>
                                <td>$price</td>
                              </tr>";
                    }
                } else {
                    echo '<tr><td colspan="3"><div class="empty-state">No products found yet.</div></td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</div><!-- /.page-wrapper -->

</body>
</html>
