<?php 
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])) {

    $student_number = $_POST['student_number'];
    $first_name     = $_POST['first_name'];
    $last_name      = $_POST['last_name'];
    $email          = $_POST['email'];
    $course         = $_POST['course'];

    $query = "UPDATE students SET
                student_number='$student_number',
                first_name='$first_name',
                last_name='$last_name',
                email='$email',
                course='$course'
              WHERE id=$id";

    mysqli_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Edit Student</h2>

    <form method="POST">
        <div class="mb-3">
            <label>Student Number</label>
            <input type="text" name="student_number" class="form-control"
                   value="<?php echo $row['student_number']; ?>" required>
        </div>

        <div class="mb-3">
            <label>First Name</label>
            <input type="text" name="first_name" class="form-control"
                   value="<?php echo $row['first_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Last Name</label>
            <input type="text" name="last_name" class="form-control"
                   value="<?php echo $row['last_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control"
                   value="<?php echo $row['email']; ?>" required>
        </div>

        <div class="mb-3">
            <label>Course</label>
            <input type="text" name="course" class="form-control"
                   value="<?php echo $row['course']; ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>

</body>
</html>