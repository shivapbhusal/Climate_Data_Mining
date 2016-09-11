<?php
ini_set('display_errors', 1); 
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
   $country=$_GET["country"];
    $indices=$_GET["indices"];
    // $countrycode = 'NPL';
    //$indices = 'foodfinal';
    //$country=$_GET["country"];
     //$indices=$_GET["indices"];

    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "SELECT  `year`, `values` FROM   `$indices` WHERE `countrycode`= '$country'";
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
      //header('Location: linegraph.html');
     // include( "linegraph.html");
    
?>