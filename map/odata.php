<?php
ini_set('display_errors', 1); 
    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
     //$country = 'NPL';
    // $indices = 'foodfinal';
   // $country=$_GET["country"];
     
    // $indices=$_GET["indices"];

    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);

     $myquery = "SELECT  c.countryname AS `Country Name`, g.countrycode AS `Country Code`,
    sum(case when `year` = '1995' then g.values else 0 end) AS `1995`,
        sum(case when `year` = '1996' then g.values else 0 end) AS `1996`,
        sum(case when `year` = '1997' then g.values else 0 end) AS `1997`,
        sum(case when `year` = '1998' then g.values else 0 end) AS `1998`, 
        sum(case when `year` = '1999' then g.values else 0 end) AS `1999`,
        sum(case when `year` = '2000' then g.values else 0 end) AS `2000`,
        sum(case when `year` = '2001' then g.values else 0 end) AS `2001`,
        sum(case when `year` = '2002' then g.values else 0 end) AS `2002`,
         sum(case when `year` = '2003' then g.values else 0 end) AS `2003`, 

         sum(case when `year` = '2004' then g.values else 0 end) AS `2004`, 
         sum(case when `year` = '2005' then g.values else 0 end) AS `2005`,
        sum(case when `year` = '2006' then g.values else 0 end) AS `2006`,
        sum(case when `year` = '2007' then g.values else 0 end) AS `2007`,
        sum(case when `year` = '2008' then g.values else 0 end) AS `2008`,
        sum(case when `year` = '2009' then g.values else 0 end) AS `2009`, 
         sum(case when `year` = '2010' then g.values else 0 end) AS `2010`, 
         sum(case when `year` = '2011' then g.values else 0 end) AS `2011`,
        sum(case when `year` = '2012' then g.values else 0 end) AS `2012`
        
        
FROM    overallvfinal g
INNER JOIN countryinfo c
ON c.countrycode=g.countrycode
WHERE   `year` between '1995' and '2012'
GROUP BY g.countrycode";
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