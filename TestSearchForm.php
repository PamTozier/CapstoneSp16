 #DropDown Code Snippet
 include "config.php"; // Database connection using PDO

//$sql="SELECT name,id FROM student"; 

$sql="SELECT name,id FROM student order by name"; 

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select name=student value=''>Student Name</option>"; // list box select command

foreach ($dbo->query($sql) as $row){//Array or records stored in $row

echo "<option value=$row[id]>$row[name]</option>"; 

/* Option values are added by looping through the array */ 

}

 echo "</select>";// Closing of list box

 #Code for Searching Snippet

 <?php
/**
 * Performs a search
 *
 * This class is used to perform search functions in a MySQL database
 *
 */
class search {
  /**
   * MySQL connection 
   */
  private $mysqli;
  
  /**
   * Constructor
   *
   * This sets up the class
   */
  public function __construct() {
    // Connect to our database and store in $mysqli property
    $this->connect();
  }
  /**
   * Database connection
   * 
   * This connects to our database
   */
  private function connect() {
    $this->mysqli = new mysqli( 'localhost', 'root', 'root', 'snippets' );
  }
  
  /**
   * Search routine
   * 
   * Performs a search
   * 
   * @param string $search_term The search term
   * 
   * @return array/boolen $search_results Array of search results or false
   */
  public function search($search_term) {
    // Sanitize the search term to prevent injection attacks
    $sanitized = $this->mysqli->real_escape_string($search_term);
    
    // Run the query
    $query = $this->mysqli->query("
      SELECT title
      FROM search
      WHERE title LIKE '%{$sanitized}%'
      OR body LIKE '%{$sanitized}%'
    ");
    
    // Check results
    if ( ! $query->num_rows ) {
      return false;
    }
    
    // Loop and fetch objects
    while( $row = $query->fetch_object() ) {
      $rows[] = $row;
    }
    
    // Build our return result
    $search_results = array(
      'count' => $query->num_rows,
      'results' => $rows,
    );
    
    return $search_results;
  }
}