<?php
ini_set('display_errors', 1); 
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
    
    $countryone=$_GET["countryone"];
    $countrytwo=$_GET["countrytwo"];
    $index =$_GET["indices"]; 

    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT  `year`, 

        sum(case when `countrycode` = '$countryone' then `values` else 0 end) AS `countryone`,
        sum(case when `countrycode` = '$countrytwo' then `values` else 0 end) AS `countrytwo`
        
FROM   `$index`
GROUP BY `year`
";
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
    array('label' => $countryone, 'type' => 'number'),
    array('label' => $countrytwo, 'type' => 'number'),
     
    
    // etc...
);
    $rows = array();
while($r = mysql_fetch_assoc($query)) {
    $temp = array();
    // each column needs to have data inserted via the $temp array
    $temp[] = array('v' => $r['year']);
    $temp[] = array('v' => $r['countryone']);
    $temp[] = array('v' => $r['countrytwo']);
    
   
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