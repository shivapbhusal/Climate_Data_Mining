<!DOCTYPE html>
<meta charset="utf-8">
<title>Carbon Vs Vulnerability Index</title>
  
  <link href="../css/bootstrap-combined.css" rel="stylesheet">
  <link href="../css/select2-bootstrap.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/select2.css" rel="stylesheet">
  <script src="../js/jquery-1.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/underscore-min.js"></script>
  <script src="../js/select2.js"></script>
  <link rel="stylesheet" href="../css/main.css">
  <script src="../js/d3.v3.js"></script>
  <script src="../js/simple_statistics.js"></script>
  <link rel="stylesheet" href="../css/font-awesome.min.css">

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
    .header h1 {
      margin-top: 50px;
      position: relative;
      text-align: center;
      left: 200;
    }
.header h3 {
      margin-top: 5px;
      position: relative;
      text-align: center;
      left: 200;
    }
.axis path,
.axis line {
  fill: none;
  stroke: green;
  stroke-width: 3px;
  shape-rendering: crispEdges;
}

.x.axis path {
  stroke: green;
  stroke-width: 3px;
}

.line {
  fill: none;
  stroke: orange;
  stroke-width: 0.3px;
}
.dot {
  fill: none;
  stroke: brown;
  
}

.reg {
  fill: none;
  stroke: red;
  stroke-width: 1.5px;
}

</style>
<div id="content">
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
                                <li><a href="../regression/gain_vs_read.php">ND Gain VS Readiness </a></li>
                                <li><a href="../regression/gain_vs_vul.php" target ="blank">ND Gain VS Vulnerability </a></li>
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
    <div class="header">
      <h1 >Multi Bar Graph of Various Indices</h1>
      <h3></h3>
      <br></br>
    </div>
<body id="chart">

<form action ="" method ="">
	<center>
<h3> Scatter plot between Carbon Emission and Vulnerability Index <h3> 
<h5></h5>
<form action ="" method ="">


<tr id="tableRow">
        <th valign="bottom">Select Year:</th>
        <td >   
        <select name="year" id="myyear" class="">
            
            <option value= "1995">Year 1995</option>
             <option value= "1996">Year 1996</option>
              <option value= "1997">Year 1997</option>
             <option value= "1998">Year 1998</option>
              <option value= "1999">Year 1999</option>
             <option value= "2000">Year 2000</option>
              <option value= "2001">Year 2001</option>
             <option value= "2002">Year 2002</option>
              <option value= "2003">Year 2003</option>
             <option value= "2004">Year 2004</option>
              <option value= "2005">Year 2005</option>
             <option value= "2006">Year 2006</option>
              <option value= "2007">Year 2007</option>
             <option value= "2008">Year 2008</option>
             <option value= "2009">Year 2009</option>
             <option value= "2010">Year 2010</option>
             <option value= "2011">Year 2011</option>
             <option value= "2012">Year 2012</option>







            </select>
            
        </td>
        <td valign="top">
            <input id="action" class="btn btn-success btn-large" onclick="displayGraph();" value="Display Graph"/>
            </td>
</tr>
</center>
</form>
<script>
displayGraph();
function displayGraph(){

var year = document.getElementById("myyear").value;
// var countryCombo = document.getElementById("myCountry");
// var indexCombo = document.getElementById("myIndices");
var content = document.getElementById("content");
document.getElementById("chart").innerHTML = "";
// document.getElementById("body").appendChild(countryCombo);
// document.getElementById("body").appendChild(indexCombo);
document.getElementById("chart").appendChild(content);


var margin = {top: 20, right: 20, bottom: 30, left: 450},
    width = 980 - margin.left - margin.right,
    height = 400- margin.top - margin.bottom;

//var parsevulindex = d3.time.format("%d-%b-%y").parse;

var x = d3.time.scale()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom").ticks(8);

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left").ticks(10);

var line = d3.svg.line()
    .x(function(d) { return x(d.vulindex); })
    .y(function(d) { return y(d.emission); });

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.json("data/carbon_vul_data.php?year="+year, function(error, data) {
  data.forEach(function(d) {
    d.vulindex = +d.vulindex;
    d.emission = +d.emission;
  });

  x.domain(d3.extent(data, function(d) { return d.vulindex; }));
  y.domain(d3.extent(data, function(d) { return d.emission; }));

  // Derive a linear regression
  var lin = ss.linear_regression().data(data.map(function(d) {
    return [+d.vulindex, d.emission];
  })).line();

  // Create a line based on the beginning and endpoints of the range
  var lindata = x.domain().map(function(x) {
    return {
      // vulindex: new vulindex(x),
      vulindex: new Date(x),
      emission: lin(+x)
    };
  });

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
      .append("text")
      .attr("transform", "rotate()")
      .attr("x", +900)
      .attr("dy", "-0.4cm")
      .style("text-anchor", "end")
      .text("(Carbon emission)");
      //.append("text")
      //.attr("transform", "rotate(-90)")
      //.attr("x", 6)
      //.attr("dx", ".71em")
      //.style("text-anchor", "end")
      //.text("Carbon emission");

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
      .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("(vulindex)");

svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("r", 1.0)
      .attr("cx", function(d) { return x(d.vulindex); })
      .attr("cy", function(d) { return y(d.emission); }); 

  // svg.append("path")
    //  .datum(data)
      //.attr("class", "line")
      //.attr("d", line);
      
 svg.append("path")
      .datum(lindata)
      .attr("class", "reg")
      .attr("d", line);
});
}
</script>
<script>
$(document).ready(function() { $("#myyear").select2({ width: 'resolve' }); });

</script>
</body>
