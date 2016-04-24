 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Course Numbers</title>
    <meta http-equiv="content-type"
        content="text/html; charset=iso-8859-1" />
    </head>
    <body>
<p>
 <?php
       
        $DBConnect = @mysql_connect("localhost","root", "");
            if ($DBConnect === FALSE)
                echo "<p>Unable to connect to the database server.</p>" . "<p>Error Code " . mysql_errno() . ": " . mysql_error() . "</p>";
            else {
            $DBName="frcccourses";
                if (!@mysql_select_db($DBName, $DBConnect)) {
                    echo "<p>There are no courses available.</p>";
                } else {
                     @mysql_select_db($DBName, $DBConnect);
                        $TableName = "CourseNum";
                        $SQLstring = "SELECT *  FROM `CourseNum` ";
                        $QueryResult = @mysql_query($SQLstring, $DBConnect);
                        if (mysql_num_rows($QueryResult) == 0) {
                            echo "<p>There are no courses at this time.</p>";
                    } else {
                        echo "<p>Available Courses:</p>";
                        echo "<table width='100%' border='1'>";
                        echo "<tr><th>Course Number</th><th>Credits</th></tr>";
                            while (($Row = mysql_fetch_assoc($QueryResult)) !== FALSE) {
                                echo "<tr><td>{$Row['CourseNum']}</td>";
                                echo "<td>{$Row['CourseCredits']}</td>";
                                
                                
                                echo "</tr>";
                            
                            }
                        }
                            
                mysql_free_result($QueryResult);
            }
           mysql_close($DBConnect);
        }
        
        ?>
    </p>
        </body>
    </html>
