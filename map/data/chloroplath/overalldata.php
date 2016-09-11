<?php
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
    $year='2001';
    $indices='gainfinal';
    
    
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
     if ( $indices =='gainfinal' )
     {
         $myquery = "SELECT c.countryname,c.countrycode, g.values AS '".$year."' FROM countryinfo c INNER JOIN ".$indices." g ON c.countrycode=g.countrycode WHERE year= '".$year."'";
    $query = mysql_query($myquery);
     }
     else
     {

    $myquery = "SELECT c.countryname,c.countrycode, g.values *100 AS '".$year."' FROM countryinfo c INNER JOIN ".$indices." g ON c.countrycode=g.countrycode WHERE year= '".$year."'";
    $query = mysql_query($myquery);
}

    
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