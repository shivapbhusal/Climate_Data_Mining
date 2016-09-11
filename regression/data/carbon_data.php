<?php
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
   
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
    $year=$_GET["year"];

    $myquery = "SELECT g.gainindex, c.emission 
    FROM combinedoverall g
    INNER JOIN carbonfinal c ON c.countrycode= g.countrycode AND c.year=g.year WHERE c.year='$year' ORDER BY gainindex"; 
    
    $query = mysql_query($myquery);
    
    if ( ! $query ) {
        echo mysql_error();
        die;
    }
    
    $data = array();
    
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    
    echo json_encode($data);     
     
    mysql_close($server);
?>