<?php # Script 9.5 - register.php #2


$page_title = 'Registration';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "frcccourses";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}

$conn->close();


// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}


        $fn = trim($_POST['SFname']);   
        $ln = trim($_POST['SLname']);    
        $e = trim($_POST['Semail']);
        $p = trim($_POST['Sphone']);  
        $c = trim($_POST['Course']);
   
   $errors = array(); // Initialize an error array.
    
    // Check for a first name:
    if (empty($_POST['SFname'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($conn, trim($_POST['SFname']));
    }
    
    // Check for a last name:
    if (empty($_POST['SLname'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($conn, trim($_POST['SLname']));
    }
    
    // Check for an email address:
    if (empty($_POST['Semail'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($conn, trim($_POST['Semail']));
    }
    
    // Check for a phone number:
    if (empty($_POST['Sphone'])) {
            $errors[] = 'You forgot to enter your phone number.';
        } else {
            $p = mysqli_real_escape_string($conn, trim($_POST['Sphone']));
       
    }
    //Check for the course selection
    if(empty($_POST['Course'])){
 echo $_POST['Course'] . "Course Number";
    } else{

    $c = mysqli_real_escape_string($conn, trim($_POST['Course']));  // Storing Selected Value In Variable

}
    
    if (empty($errors)) { // If everything's OK.
    
        // Register the user in the database...
        
        // Make the query:
        $q = "INSERT INTO student (SFname, SLname, Semail, Sphone) VALUES ('$fn', '$ln', '$e', '$p');";       
        $r = @mysqli_query ($conn, $q); // Run the query.
        
        if ($r) { // If it ran OK.
        
            // Print a message:
            echo '<h1>Thank you! </h1>
        <p>'.$fn .' ' . $ln . ' you are now registered for:  </p>'
        $sql2 = "SELECT CourseNumber.CourseNum, CourseNumber.CourseTitle, 
        CourseDesc.CourseDescription FROM CourseNumber 
        Where CourseNumber.CourseNum=$c;";
        
        $course= @mysqli_query ($conn,$sql2);
        
        If (mysqli_num_rows($result) > 0) {
     echo "<table><tr><th>Course Num&#8195;</th><th>Course Title&#8195;</th><th>Course Credits</th></tr>";
     // output data of the query
     while($row = mysqli_fetch_assoc($course)) {
         echo "<tr><td>" . $row["CourseNum"]. "&#8195;</td><td>" . $row["CourseTitle"]. "
         &#8195; </td><td>&#8195;" . $row["CourseCredit"]. " </td><td>&#8195;" . $row["CourseDescription"]. " </td></tr></form>";
    echo "</table>";
    
        


        
        } else { // If it did not run OK.
            
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
            
            // Debugging message:
            echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
                        
        } 
            //get course Information from database
        $sql2 = "SELECT CourseNumber.CourseNum, CourseNumber.CourseTitle, 
        CourseDesc.CourseDescription FROM CourseNumber 
        Where CourseNumber.CourseNum=$c;";
        //run the query
        $course= @mysqli_query ($conn,$sql2);
        //print the course details
            echo $course;
        // End of if ($r) IF.
        
        
        exit();
        
    } else { // Report the errors.
        
        echo '<h1>Error!</h1>
      <p class="error">The following error(s) occurred:<br /> ';
       foreach ($errors as $msg) { 
            echo " - $msg<br />\n";
       }
        echo '</p><p>Please try again.</p><p><br /></p>';
        
    } // End of if (empty($errors)) IF.
    
    mysqli_close($conn); // Close the database connection.

} // End of the main Submit conditional.
?>
<h1>Register</h1>

<form action="registerform1.php" method="post">
    <p>First Name: <input type="text" name="SFname" size="15" maxlength="20" value="<?php if (isset($_POST['SFname'])) echo $_POST['SFname']; ?>" /></p>
    <p>Last Name: <input type="text" name="SLname" size="15" maxlength="40" value="<?php if (isset($_POST['SLname'])) echo $_POST['SLname']; ?>" /></p>
    <p>Email Address: <input type="text" name="Semail" size="20" maxlength="60" value="<?php if (isset($_POST['Semail'])) echo $_POST['Semail']; ?>"  /> </p>
    <p>Phone: <input type="text" name="Sphone" size="10" maxlength="20" value="<?php if (isset($_POST['Sphone'])) echo $_POST['Sphone']; ?>"  /></p>
    <select name='Course'>
<option value='CIS 145'>CIS 145</option>
<option value='CIS 243'>CIS 243</option>
<option value='CSC 119'>CSC 119</option>
<option value='CWB 205'>CWB 205</option>
<option value='CWB 208'>CWB 208</option>
<option value='MGD 111'>MGD 111</option>
<option value='MGD 141'>MGD 141</option>
</select>

    <p><input type="submit" name="submit" value="Register" /></p>
</form>
<?php
/*$sql = "SELECT CourseNumber.CourseID, CourseNumber.CourseNum, CourseNumber.CourseCredit, CourseDesc.CourseTitle FROM CourseDesc
JOIN CourseNumber
ON CourseDesc.CourseID=CourseNumber.CourseNum;";
*/
//$res=$conn->query($sql);
//$row[i] = $res->fetch_array(MYSQLI_BOTH);

//echo $row[i];
?>
<!-- <form action='#' method='POST'>
<select name='Course Number'>
<option value='CourseNum'>'CIS 145'</option>
<option value='CourseNum'>'CIS 243'</option>
<option value='CourseNum'>'CSC 119'</option>
<option value='CourseNum'>'CWB 205'</option>
<option value='CourseNum'>'CWB 208'</option>
<option value='CourseNum'>'MGD 111'</option>
<option value='CourseNum'>'MGD 141'</option>
</select>
<input type='submit' name='Course Number' value='Get Selected Values' />
</form> -->
<?php
/*if(isset($_POST['submit'])){

$selected_val = $_POST['Course Number'];  // Storing Selected Value In Variable

echo $selected_val;

$sql2 = "SELECT CourseNumber.CourseNum, CourseNumber.CourseTitle, 
CourseDesc.CourseDescription FROM CourseNumber 
Where CourseNumber.CourseNum=$selected_val;";
$course=$conn->query($sql2);

echo "You have selected :" .$course;  // Displaying Selected Value
}
*/
?>