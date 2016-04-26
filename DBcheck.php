<html><body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frcccourses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} //else echo("Connected");

//$result = "SELECT * from CourseDesc;"

$sql = "SELECT CourseNumber.CourseNum, CourseNumber.CourseCredit, CourseDesc.CourseTitle, CourseDesc.CourseDescription FROM CourseDesc
JOIN CourseNumber
ON CourseDesc.CourseID=CourseNumber.CourseNum;";

//Echo "the results are: " . $sql;
$result = mysqli_query($conn, $sql);

//previous in if condition: $result->num_rows > 0
If (mysqli_num_rows($result) > 0) {
     echo "<table><tr><th>Course Num</th><th>Course Title</th><th>Course Description</th></tr>";
     // output data of ea ch row
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row["CourseNum"]. "</td><td>" . $row["CourseTitle"]. " </td><td> " . $row["CourseDescription"]. "</td></tr>";
     }
     echo "</table>";
} else {
     echo "0 results";
}

$conn->close();
?>  

</body>
</html>