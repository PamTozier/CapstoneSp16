<html><body>
<?php
session_start();

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

$sql = "SELECT CourseNumber.CourseNum, CourseNumber.CourseCredit, CourseDesc.CourseTitle FROM CourseDesc
JOIN CourseNumber
ON CourseDesc.CourseID=CourseNumber.CourseNum;";

//Echo "the results are: " . $sql;
$result = mysqli_query($conn, $sql);

//previous in if condition: $result->num_rows > 0
If (mysqli_num_rows($result) > 0) {
     echo "<table><tr><th>Select&#8195;</th><th>Course Num&#8195;</th><th>Course Title&#8195;</th><th>Course Credits</th></tr>";
     // output data of ea ch row
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>
         <form method='POST' action='registerform.php'><input type='submit' name='Register' value='Select'&#8195;/>
         </td><td>" . $row["CourseNum"]. "&#8195;</td><td>" . $row["CourseTitle"]. "&#8195; </td><td>&#8195;" . $row["CourseCredit"]. " </td></tr></form>";
     }
     echo "</table>";
  /*   $selection = "SELECT CourseDescription FROM Coursedesc Join CourseNumber.CourseNum=CourseDesc.CourseID ON CourseNumber;"*/
} else {
     echo "0 results";
}

$conn->close();
?>  

</body>
</html>