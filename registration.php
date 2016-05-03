<!DOCTYPE html>
<!--[if IE 9]>     		<html class="no-js lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> 	<html class="no-js" lang="en"> <!--<![endif]-->
	<head>
		<!--force IE to render in latest mode, NOT compat mode. This must come first in the doc to work-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--Set the standard character set -->
		<meta charset="utf-8">
		<!--Force the viewport to render at 100% on most devices-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--A short description about the holistic website-->
		<meta name="description" content="Welcome to the Front Range Multimedia Graphic Design (MGD) department. Here you can learn more about programs offered, the MGD Faculty, and much more!">
		<!--Who did this thing?!-->
		<meta name="author" content="Miriam Leon, Danielle Arrick-Young, Michael Dryburgh, Anna Marie Sellars, Pamela Willis-Tozier">
		<meta name="keywords" content="Multimedia, Graphic, Design, Front, Range, Community, College, Westminster, Boulder, Fort Collins, Brighton, web, animation, video, photoshop, illustrator, flash, technology">
		<!--Don't cache me in-->
		<meta http-equiv="pragma" content="no-cache">
		<title>Multimedia Graphic Design | Front Range Community College | Student Produced Website</title>		
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" href="imgs/mgdfavicon.ico" type="image/x-icon" />
		<link rel="author" href="humans.txt">
		<!--Call stylesheets here-->        		
		<link href="styles/main.css" rel="stylesheet" type="text/css">
		<!--This is the only javaScript that should be in the <head> tag. All other calls should be placed right before the closing </body> tag.-->
		<script src="scripts/vendor/modernizr-2.6.2.min.js"></script>        
	</head>
	<body>
		<!--[if lte IE 8]>
	        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	    <![endif]-->
        <div class="wrapper">       
        
        <header role="banner">
        	<h1><img src="imgs/header_MGD.jpg" alt="Background image of Denver for document header"></h1>
            <div class="headerOverlay">
                <div class="headerLeft verticalHeaderLine">
                    <img src="imgs/FRCC-Logo_white.png" alt="Front Range Community College Logo" class="logo">
                </div>
                <div class="headerRight">
                  <h1 class="topHeading">Multimedia</h1>
                  <h1 class="bottomHeading">Graphic Design</h1>
                </div>
                <div class="contactUs">
                	<h2>Contact Us</h2>
                </div>               
                <ul class="socialMedia">                    
                    <li><a href="https://www.facebook.com/FrontRangeCommunityCollege" target="_blank" class="facebook"><img src="imgs/Facebook_Icon.png" alt="Link to FRCC Facebook Page"></a></li>
                    <li><a href="https://twitter.com/frcc" target="_blank" class="twitter"><img src="imgs/Twitter_Icon.png" alt="Link to FRCC Twitter Page"></a></li>
                    <li><a href="https://www.linkedin.com/edu/school?id=20201" target="_blank" class="linkedin"><img src="imgs/linkedin_Icon.png" alt="Link to FRCC Linked In Page"></a></li>
                    <li><a href="https://frontrange.formstack.com/forms/ask_frcc_email_form" target="_blank" class="email"><img src="imgs/Email_Icon.png" alt="Send email to FRCC"></a></li>
                </ul>                              
            </div>        
        </header>
        
        <nav class="mainNav" role="navigation">
            <ul class="menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="gallery.html">Student Work</a></li>
                <li><a href="faculty.html">Faculty Info</a></li>
                <li><a href="lab.html">Lab Times</a></li>
            </ul>
        </nav>        
        
        <article class="registration" role="main">
            <div class="regBorder">
                <a name="here"/>
			<?php # 

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
        $sql2 = "SELECT CourseNumber.CourseNum, CourseNumber.CourseTitle, 
        CourseDesc.CourseDescription FROM CourseNumber 
        Where CourseNumber.CourseNum=$c;";
        $course= @mysqli_query ($conn,$sql2);
            // Print a message:
          echo '<h1>Thank you! </h1>
        <p>' . $fn . ' ' . $ln . ' is now registered for ' . $c . '.</p><p><br /></p>';    
        echo $course;
        } else { // If it did not run OK.
            
            // Public message:
            echo '<h1>System Error</h1>
            <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
            
            // Debugging message:
            echo '<p>' . mysqli_error($conn) . '<br /><br />Query: ' . $q . '</p>';
                        
        } // End of if ($r) IF.
        
        
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

<form action="registration.php" method="post">
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
			</div>
        </article>
        
        <footer role="contentinfo">
            <ul>
                <li>
                    <p>Westminster Campus<br>
                    3645 West 112th Ave.<br>
                    Westminster, CO 80031<br>
                    <a href="http://www.frontrange.edu/campuses/campus-locations/westminster-campus" target="_blank">www.frontrange.edu/<br>Westminster</a><br>
                    Phone: 303.404.5000<br>
                    Fax: 303.466.1623</p>
                </li>            
                <li>
                    <p>Larimer Campus<br>
                    4616 S. Shields St.<br>
                    Fort Collins, CO 80526<br>
                    <a href="http://www.frontrange.edu/campuses/campus-locations/larimer-campus" target="_blank">www.frontrange.edu/<br>Larimer</a><br>
                    Phone: 970.226.2500<br>
                    Fax: 970.204.8484</p>
                </li>            
                <li>
                    <p>Boulder Campus<br>
                    2190 Miller Drive<br>
                    Longmont, CO 80501<br>
                    <a href="http://www.frontrange.edu/campuses/campus-locations/boulder-county-campus" target="_blank">www.frontrange.edu/<br>Boulder</a><br>
                    Phone: 303.678.3722<br>
                    Fax: 303.678.3699</p>
                </li>            
                <li>
                    <p>Brighton Center<br>
                    1850 E. Egbert St.<br>
                    Brighton, CO<br>
                    <a href="http://www.frontrange.edu/campuses/campus-locations/brighton-center" target="_blank">www.frontrange.edu/<br>Brighton</a><br>
                    Phone: 303.404.5099</p>
                </li>            
                <li>
                    <p>Online Learning<br>
                    Phone: 303.404.5513<br>
                    Phone: 970.204.8250</p>
                </li>
            </ul>
            <p class="copyright">
            Copyright &copy; 2015<br>
            Created by Front Range Community College Students: Miriam Leon, Danielle Arrick-Young, Michael Dryburgh, Anna Marie Sellars, Pamela Willis-Tozier
            </p>
    	</footer>
        
		</div>        
        
        <div class="burgerBtn">        	
        </div>
        
        <nav class="mobileNav">
            <ul class="mobileMenu">
                <li><a href="index.html">Home</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="gallery.html">Student Work</a></li>
                <li><a href="faculty.html">Faculty Info</a></li>
                <li><a href="lab.html">Lab Times</a></li>
            </ul>
            <div class="mobileContactUs">
                <p>Contact Us</p>
            </div>
            <ul class="mobileMedia">                    
                <li><a href="https://www.facebook.com/FrontRangeCommunityCollege" target="_blank" class="facebook"><img src="imgs/Facebook_Icon.png" alt="Link to FRCC Facebook Page"></a></li>
                <li><a href="https://twitter.com/frcc" target="_blank" class="twitter"><img src="imgs/Twitter_Icon.png" alt="Link to FRCC Twitter Page"></a></li>
                <li><a href="https://www.linkedin.com/edu/school?id=20201" target="_blank" class="linkedin"><img src="imgs/linkedin_Icon.png" alt="Link to FRCC Linked In Page"></a></li>
                <li><a href="https://frontrange.formstack.com/forms/ask_frcc_email_form" target="_blank" class="email"><img src="imgs/Email_Icon.png" alt="Send email to FRCC"></a></li>
            </ul>
            <div class="burgerBtn">        	
        	</div>
        </nav>        
        
        <!--CDN jQuery library with local fall back-->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="scripts/vendor/jquery-1.11.1.min.js"><\/script>')</script>          
        
        <script src="scripts/plugins.js"></script>
        <script type="text/javascript" src="scripts/main.js"></script>
        
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-62452409-1', 'auto');
		  ga('send', 'pageview');
		
		</script>
	</body>
</html>