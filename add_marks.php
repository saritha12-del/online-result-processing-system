<?php
include "db.php";

if(isset($_POST['submit']))
{
    $roll = $_POST['roll_no'];
    $s1 = $_POST['subject1'];
    $s2 = $_POST['subject2'];
    $s3 = $_POST['subject3'];

    $total = $s1 + $s2 + $s3;
    $percentage = $total / 3;

    if($percentage >= 90)
        $grade = "A";
    elseif($percentage >= 75)
        $grade = "B";
    elseif($percentage >= 60)
        $grade = "C";
    elseif($percentage >= 50)
        $grade = "D";
    else
        $grade = "Fail";

    $sql = "INSERT INTO marks VALUES('$roll','$s1','$s2','$s3','$total','$grade')";

    if(mysqli_query($conn,$sql))
        echo "Marks Added Successfully!";
    else
        echo "Error!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Marks</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Enter Student Marks</h2>

<form method="POST">

Roll Number:<br>
<input type="number" name="roll_no" required><br><br>

Subject 1:<br>
<input type="number" name="subject1" required><br><br>

Subject 2:<br>
<input type="number" name="subject2" required><br><br>

Subject 3:<br>
<input type="number" name="subject3" required><br><br>

<input type="submit" name="submit" value="Add Marks">

</form>
<br><br>
<a href="index.php">Back to Home</a>
</body>
</html>