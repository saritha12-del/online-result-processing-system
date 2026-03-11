<?php
include "db.php";

if(isset($_POST['submit']))
{
    $roll = $_POST['roll_no'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];

    $sql = "INSERT INTO students VALUES('$roll','$name','$branch')";

    if(mysqli_query($conn,$sql))
    {
        echo "Student Added Successfully!";
    }
    else
    {
        echo "Error!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    
<title>Add Student</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<h2>Add Student</h2>

<form method="POST">

Roll Number:<br>
<input type="number" name="roll_no" required><br><br>

Name:<br>
<input type="text" name="name" required><br><br>

Branch:<br>
<input type="text" name="branch" required><br><br>

<input type="submit" name="submit" value="Add Student">

</form>
<br><br>
<a href="index.php">Back to Home</a>
</body>
</html>