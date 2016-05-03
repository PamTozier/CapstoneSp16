<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.
session_start();

$_SESSION['CourseNum'];
$_SESSION['CourseTitle'];

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

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
   // require ('../mysqli_connect.php'); // Connect to the db.
        
    $errors = array(); // Initialize an error array.
    
    // Check for a first name:
    if (empty($_POST['Sfname'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($conn, trim($_POST['Sfname']));
    }
    
    // Check for a last name:
    if (empty($_POST['Slname'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($conn, trim($_POST['Slname']));
    }
    
    // Check for an email address:
    if (empty($_POST['Semail'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($conn, trim($_POST['Semail']));
    }
    
    // Check for a password and match against the confirmed password:
    if (empty($_POST['Sphone'])) {
            $errors[] = 'You forgot to enter your phone number.';
        } else {
            $p = mysqli_real_escape_string($dbc, trim($_POST['Sphone']));
       
    }
    
    if (empty($errors)) { // If everything's OK.
    
        // Register the user in the database...
        
        // Make the query:
        $q = "INSERT INTO student ('Sfname', 'Slname', 'Semail', 'Sphone', registration_date) VALUES ('$fn', '$ln', '$e', '$p', NOW() )";       
        $r = @mysqli_query ($conn, $q); // Run the query.
        if ($r) { // If it ran OK.
        
            // Print a message:
            echo '<h1>Thank you!</h1>
        <p>You are now registered for " . $CourseNum . " " . $CourseTitle . ".</p><p><br /></p>';    
        
        } else { // If it did not run OK.
            
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
            
            // Debugging message:
            echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
                        
        } // End of if ($r) IF.
        
        //mysqli_close($conn); // Close the database connection.

        // Include the footer and quit the script:
        
        exit();
        
    } else { // Report the errors.
    
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p><p><br /></p>';
        
    } // End of if (empty($errors)) IF.
    
    //mysqli_close($conn); // Close the database connection.

} // End of the main Submit conditional.
?>
<h1>Register</h1>
<?php 
/*while($row = mysqli_fetch_array($row, MYSQLI_ASSOC)) {
echo '<tr><td>Course' . $row['CourseNum'] . " " . $row['CourseTitle'] . '</td></tr>';}*/

$selection = "SELECT CourseDescription FROM Coursedesc Join CourseNumber.CourseNum=CourseDesc.CourseID ON CourseNumber;" 
//print "<p>You have selected " . $CourseNum . " " . $CourseTitle . "</p>

//'<br/>Course Description: ' . $selection.'.';

?>
<form action="registerform.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['Sfname'])) echo $_POST['Sfname']; ?>" /></p>
    <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['Slname'])) echo $_POST['Slname']; ?>" /></p>
    <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['Semail'])) echo $_POST['Semail']; ?>"  /> </p>
    <p>Phone: <input type="text" name="Phone" size="10" maxlength="20" value="<?php if (isset($_POST['Sphone'])) echo $_POST['Sphone']; ?>"  /></p>
    
    <p><input type="submit" name="submit" value="Register" /></p>
</form>
