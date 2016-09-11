<?php
ini_set('display_errors', 1); 
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
    
    $country=$_GET["country"];
     

    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT  g.year, g.values AS `gainindex`, f.values*100 AS `vulindex`, r.values*100 AS `readinessindex`  FROM  gainfinal g INNER JOIN overallvfinal f INNER JOIN finaloverallr r ON g.countrycode=f.countrycode AND g.countrycode=r.countrycode AND g.year =f.year AND g.year=r.year WHERE g.countrycode= '$country'";
    $query = mysql_query($myquery);
    $table = array();
    $table['cols'] = array(
    /* define your DataTable columns here
     * each column gets its own array
     * syntax of the arrays is:
     * label => column label
     * type => data type of column (string, number, date, datetime, boolean)
     */
    array('label' => 'year', 'type' => 'string'),
    array('label' => 'gainindex', 'type' => 'number'),
    array('label' => 'vulindex', 'type' => 'number'),
     array('label' => 'readinessindex', 'type' => 'number'),
    
    // etc...
);
    $rows = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    // each column needs to have data inserted via the $temp array
    $temp[] = array('v' => $r['year']);
    $temp[] = array('v' => $r['gainindex']);
    $temp[] = array('v' => $r['vulindex']);
    $temp[] = array('v' => $r['readinessindex']);
   
    // etc...
    
    // insert the temp array into $rows
    $rows[] = array('c' => $temp);
}
// populate the table with rows of data
$table['rows'] = $rows;

// encode the table as JSON
$jsonTable = json_encode($table);

// set up header; first two prevent IE from caching queries
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

// return the JSON data
echo $jsonTable;
?>