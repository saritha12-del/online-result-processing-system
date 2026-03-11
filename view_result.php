<?php
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>View Result</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Check Student Result</h2>

<form method="POST">
Enter Roll Number:<br>
<input type="number" name="roll_no" required>
<br><br>
<input type="submit" name="search" value="View Result">
</form>

<br>

<?php
if(isset($_POST['search']))
{
    $roll = $_POST['roll_no'];

    $sql = "SELECT students.name, students.branch, marks.subject1, marks.subject2, marks.subject3, marks.total, marks.grade 
            FROM students 
            JOIN marks ON students.roll_no = marks.roll_no
            WHERE students.roll_no='$roll'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<h3>Student Result</h3>";
            echo "Name: ".$row['name']."<br>";
            echo "Branch: ".$row['branch']."<br>";
            echo "Subject 1: ".$row['subject1']."<br>";
            echo "Subject 2: ".$row['subject2']."<br>";
            echo "Subject 3: ".$row['subject3']."<br>";
            echo "Total Marks: ".$row['total']."<br>";
            echo "Grade: ".$row['grade']."<br>";
        }
    }
    else
    {
        echo "No result found!";
    }
}
?>
<br><br>
<a href="index.php">Back to Home</a>
</body>
</html>