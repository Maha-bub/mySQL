<?php
$dbms=new mysqli('localhost','root','','students');
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $Id=$_POST['id'];
    $Name=$_POST['name'];
    $Course=$_POST['course'];
    $Phone=$_POST['phone'];

     $sql = "INSERT INTO student_info (id, name, course, contact)
            VALUES ('$Id', '$Name', '$Course', '$Phone')";
        $dbms->query($sql);

    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info Form</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">
            Student Information Form
        </h2>

        <form action="#" method="POST" class="space-y-4">

            <!-- ID -->
            <div>
                <label class="block text-gray-600 mb-1">ID</label>
                <input type="number" name="id" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter ID" required>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-gray-600 mb-1">Name</label>
                <input type="text" name="name" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter Name" required>
            </div>

            <!-- Course -->
            <div>
                <label class="block text-gray-600 mb-1">Course</label>
                <input type="text" name="course" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter Course" required>
            </div>

            <!-- Contact -->
            <div>
                <label class="block text-gray-600 mb-1">Contact</label>
                <input type="text" name="phone" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter Contact Number" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                Submit
            </button>

        </form>
    </div>


    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-4">Student List</h2>

    <table class="w-full border border-gray-300 text-center">
        <tr class="bg-gray-200">
            <th class="p-2 border">ID</th>
            <th class="p-2 border">Name</th>
            <th class="p-2 border">Course</th>
            <th class="p-2 border">Contact</th>
        </tr>
        
        
<?php
     $result = $dbms->query("SELECT * FROM student_info");

     while($row = $result->fetch_assoc()){  
?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['Name']; ?></td>
    <td><?= $row['Course']; ?></td>
    <td><?= $row['Contact']; ?></td>
</tr>
<?php } ?>


<!-- practice for table data show -->
<h3>Student information</h3>
+
 

    </table>
</div>

</body>
</html>