<html>
<head>
<title>Top Countries</title>
	
	<link href="../css/bootstrap-combined.css" rel="stylesheet">
	<link href="../css/select2-bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/select2.css" rel="stylesheet">
	<script src="../js/jquery-1.js"></script>
	<script src="../js/bootstrap.js"></script>
	<script src="../js/underscore-min.js"></script>
	<script src="../js/select2.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
	<script src="../js/jsapi.js"></script>

	 <style>
		body {
			padding: 20px 0;
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
             "Helvetica Neue", sans-serif;
      font-weight: 300;
		}
		h1, h3 {
			text-rendering: optimizeLegibility;
			font-weight: 300;
		}
		.header h1, .header h3 {
			margin-top: 50px;
			position: relative;
			display: inline-block;
		}
		#chart_div{
    
      border:1px solid #ccc;
    
}
	</style>

    <script type="text/javascript">
  // Load the Visualization API and the piechart package.
  google.load('visualization', '1', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.setOnLoadCallback(displayGraph);


  function displayGraph(){
    var year = document.getElementById('myYear').value;
    var index = document.getElementById('myIndices').value;
    

    var content = document.getElementById("content");
    document.getElementById("chart").innerHTML = "";
    document.getElementById("chart").appendChild(content);

    // These two lines are not needed anymore
    //google.load('visualization', '1', {'packages':['corechart']});
    //google.setOnLoadCallback(drawChart);
   
    function drawChart() {
      var jsonData = $.ajax({
        url: "topdata.php?&year="+year+"&indices="+index,
        dataType:"json", 
        async: false, 
        success : function(data) {
           
        }
      }).responseText;

     
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      chart.draw(data, {width: 1300, height: 600});
    }

    // Since we removed the on-load callback we need to call drawChart manually
    drawChart();
  }
</script>
</head>
<body>
<header class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    
                </a>
                
                <div class="nav-collapse collapse pull-right">
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Maps <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                 <li><a href="../map/index.php">Vulnerability</a></li>
                                <li><a href="../map/index2.php">Readiness </a></li>
                                 <li><a href="../map/ndgain.php">ND Gain</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Graphs <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../graph/bargraph.php">Bar Graphs</a></li>
                                <li><a href="../graph/linegraph.php">Line Graphs</a></li>
                            </ul>
                        </li>
                         <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Comparison<i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../comparison/linechart.php">Compare By Line Graph</a></li>
                                <li><a href="../comparison/barchart.php">Compare By Bar Graph</a></li>
                                
                            </ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Multiple Graphs<i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../multiplegraphs/multibar.php">Multiple BarGraph</a></li>
                                <li><a href="../multiplegraphs/multiline.php">Multiple LineGraph</a></li>
                                
                            </ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Regression <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../regression/carbon_vs_vulindex.php">Carbon VS ND GAin Index</a></li>
                                <li><a href="../regression/gain_vs_read.php">ND Gain VS Vulnerability </a></li>
                                <li><a href="../regression/gain_vs_vul.php" target ="blank">ND Gain VS Readiness </a></li>
                            </ul>
                        </li>

                       <li><a href="../prediction/index.php">Prediction</a></li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Anomalies <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                 <li><a href="../anomaly/aline.php">Anomaly Scores Timeseries</a></li>
                                <li><a href="../anomaly/pline.php">P Value Timeseries  </a></li>
                                 <li><a href="../anomaly/countrywise_scores.php">Anomaly Scores Countrieswise  </a></li>
                            </ul>
                        </li>


                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Top  Least <i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                 <li><a href="../rank/topcountries.php">Top Countries </a></li>
                                <li><a href="../rank/leastcountries.php">Least Countries  </a></li>
                                
                            </ul>
                        </li>

                        
                    </ul>        
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </header>
   <div class="container">
		<div class="header">
			<h1 >Top Countries</h1>
			
			<br></br>
		</div>
		
		<ul>
  <div id="chart">
<div id="content">
<form action ="" method ="POST">
<tr id="tableRow">
        <th valign="bottom">Select country:</th>
        <td >   
        <select name="year" id="myYear" class="">
            
               <option value = "1995">1995</option>
               <option value = "1996">1996</option>
               <option value = "1997">1997</option>
               <option value = "1998">1998</option>
                <option value = "1999">1999</option>
               <option value = "2000">2000</option>
               <option value = "1997">1997</option>
               <option value = "1999">1999</option>
               <option value = "2000">2000</option>
               <option value = "2001">2001</option>
               <option value = "2002">2002</option>
               <option value = "2003">2003</option>
                <option value = "2004">2004</option>
               <option value = "2005">2005</option>
               <option value = "2006">2006</option>
               <option value = "2007">2007</option>
               <option value = "2008">2008</option>
                <option value = "2009">2009</option>
               <option value = "2010">2010</option>
               <option value = "2011">2011</option>
               <option value = "2012">2012</option>




            </select>
            
        </td>
        <th valign="bottom">Select parameters:</th>
        <td >   
        <select name="indices" id="myIndices" class="" >
        <option value= "gainfinal">ND gain </option>
        <option value= "finaloverallr">Readiness Index </option>

             <option value= "overallvfinal">Overall vulnerability </option>
             
              <option value= "foodfinal">Vulnerability on food</option>
             <option value= "waterfinal">Vulnerability on water </option>
             <option value= "ecosystemfinal">Vulnerability on ecosystem </option>
             <option value= "habitatfinal">Vulnerability on habitat </option>
             <option value= "infrafinal">Vulnerability on infrastructure </option>
             <option value= "healthfinal">Vulnerability water </option>
            
             <option value= "socialfinal">Social readiness </option>
             <option value= "governancefinal">Governance readiness </option>
              <option value= "economicfinal">Economic readiness </option>

            </select>
            
        </td>
        <td valign="top">
            <input type="button" class="action" onclick="displayGraph();" value="Display Graph" />
            </td>
</tr>

</form>
<script>
$(document).ready(function() { $("#myYear").select2({ width: 'resolve' }); });
$(document).ready(function() { $("#myIndices").select2({ width: 'resolve' }); });
</script>
<div id="chart_div"></div>
</div>
</div>
</ul>
</body>
     

  <!--Load the AJAX API-->
    
</html>