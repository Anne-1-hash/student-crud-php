<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Student List</h2>
        <a href="create.php" class="btn btn-primary mb-3">Add Student</a>

        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Course</th>
                <th>Action</th>
            </tr>
        <?php
        $result = mysqli_query($conn,  "SELECT * FROM students");

        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['student_number']."</td>";
            echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['course']."</td>";
            echo "<td>
            <a href='edit.php?id=".$row['id']."' class='btn btn-warning btn-sm'>Edit</a>
            <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm'>Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
        </table>
    </div>
</body>
</html>