<?php
    function ERF ($ll, $ul, $t, $dt, $dx) {
         $val = 0;
         for($i = $ll; $i <= $ul; $i+=$dx){
              $val +=  exp(-pow($t,2)) * $dt;
         }
         return (2/sqrt(pi())) * $val;
    }

    $username = "root"; 
    $password = "";   
    $host = "localhost";
    $database="climate";
    
     
    $indices=$_GET["indices"];
    $country=$_GET["country"];
     
    // $indices=$_GET["indices"];

   
    
    
    
    $server = mysql_connect($host, $username, $password);
    $connection = mysql_select_db($database, $server);
     
    $myquery = "SELECT g.year, 
    ABS(g.`values` - stats.average) / stats.st AS `values`
FROM  `$indices` g 
CROSS JOIN (

SELECT STDDEV(  `values` ) AS st, AVG(  `values` ) AS average
FROM  `$indices` WHERE `countrycode` =  '$country' )stats 
WHERE  `countrycode` =  '$country'";

    $query = mysql_query($myquery);
     

    
    if ( ! $query ) {
        echo mysql_error();
        die;
    }
    
    $data = array();
    
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    
   // echo json_encode($data); 

    $pValue = array(array());
    $length = sizeof($data);
    $anomalyScore = array(array());
    // echo $data[0]["year"];
    // echo $length;
    for($i=0;$i<$length;$i++){
        $pValue[$i]["year"] = $data[$i]["year"];
        $pValue[$i]["values"] = 1-abs(ERF(0, $data[$i]["values"], 2, 0.1, 0.1));
        $anomalyScore[$i]["year"] = $data[$i]["year"];
        $anomalyScore[$i]["values"] = -log($pValue[$i]["values"]);
        // echo $pValue[$i];
        // echo $anomalyScore[$i];
    }
    // echo $pValue;
    // echo json_encode($pValue);
    // echo json_encode($anomalyScore);

    $table = array();
    $table['cols'] = array(
    array('label' => 'year', 'type' => 'string'),
    //array('label' => 'anomayscore', 'type' => 'number')
    array('label' => 'pvalues', 'type' => 'number')

    );

    $rows = array();
    for($i=0;$i<$length;$i++) {
        $temp = array();
        $temp[] = array('v' => $anomalyScore[$i]['year']);
      //  $temp[] = array('v' => $anomalyScore[$i]['values']);
        $temp[] = array('v' => $pValue[$i]['values']);
        $rows[] = array('c' => $temp);
    }
    $table['rows'] = $rows;


    
    $jsonTable= json_encode($table);
    echo $jsonTable; 
    
     
    mysql_close($server);
?>