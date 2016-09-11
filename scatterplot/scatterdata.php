<?php
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
    $country=$_GET["country"];
    $countryone=$_GET["countryone"];
    $countrytwo=$_GET["countrytwo"];

    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = " SELECT * FROM  `combinedoverall` WHERE `countrycode`= '$country' OR `countrycode`= '$countryone' OR `countrycode`= '$countrytwo'";
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