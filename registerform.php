<?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.
/*session_start();

$_SESSION['CourseNum'];
$_SESSION['CourseTitle'];*/

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

        $fn = trim($_POST['SFname']);   
     //   echo 'First' . $fn;  
        $ln = trim($_POST['SLname']);    
        $e = trim($_POST['Semail']);
        $p = trim($_POST['Sphone']);  

       //    echo $fn . 'First Name ' . 'Last Name' . $ln;
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
    
    // Check for a password and match against the confirmed password:
    if (empty($_POST['Sphone'])) {
            $errors[] = 'You forgot to enter your phone number.';
        } else {
            $p = mysqli_real_escape_string($conn, trim($_POST['Sphone']));
       
    }
    
    if (empty($errors)) { // If everything's OK.
    
        // Register the user in the database...
        
        // Make the query:
        $q = "INSERT INTO student (SFname, SLname, Semail, Sphone) VALUES ('$fn', '$ln', '$e', '$p');";       
        $r = @mysqli_query ($conn, $q); // Run the query.
        if ($r) { // If it ran OK.
        
            // Print a message:
            echo '<h1>Thank you! ' . $fn . '</h1>
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
    
    <p><input type="submit" name="submit" value="Register" /></p>
</form>
