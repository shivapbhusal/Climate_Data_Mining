<!DOCTYPE html>
<html> 
<meta charset="utf-8">




   <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
  <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
  <!--script src="js/less-1.3.3.min.js"></script-->
  <!--append ‘#!watch’ to the browser URL, then refresh the page. -->
  
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>











<style> /* set the CSS */

body { font: 12px Arial;}

path { 
    stroke: red;
    stroke-width: 4;
    fill: none;
}

.axis path,
.axis line {
    fill: none;
    stroke: green;
    stroke-width: 2;
    shape-rendering: crispEdges;
}

</style>
<body id="body">



  <div class="container">
  <div class="row clearfix">
    <div class="col-md-3 column">
      <ul class="nav nav-tabs">
        <li class="active">
         <div id="content">
<form action ="" method ="">
<tr id="tableRow">
        <th valign="bottom">Select country:</th>
        <td >   
        <select name="country" id="myCountry" class="">
            
             <option value= "NPL">Nepal</option>
             <option value= "IND">India</option>
             <option value = "LAO">LAOS</option>
             <option value= "IRN">IRAN</option>
             <option value= "PAk">Pakistan</option>
             <option value = "AFG">Afganistan</option>
             <option value= "AUS">Australia</option>
             <option value= "OMN">OMAN</option>
             <option value = "BGD">Bangladesh</option>

            </select>
            
        </td></p>


         <th valign="bottom">Select parameters:</th></p>
        <td >   
        <select name="indices" id="myIndices" align =""class="">
            
             <option value= "foodfinal">Vulnerability on food</option>
             <option value= "waterfinal">Vulnerability on water </option>
             <option value= "ecosystemfinal">Vulnerability on ecosystem </option>
             <option value= "habitatfinal">Vulnerability on habitat </option>
             <option value= "infrafinal">Vulnerability on infrastructure </option>
             <option value= "healthfinal">Vulnerability water </option>
             <option value= "overallvfinal">Overall vulnerability </option>
             <option value= "gainfinal">NG Gain </option>
             <option value= "socialfinal">Social readiness </option>
             <option value= "governancefinal">Governance readiness </option>
              <option value= "economicfinal">Economic readiness </option>
             
            </select>
            
        </td></p>


        <td valign="bottom">
            <input type="button" class="action" onclick="displayGraph()" value="DisplayGraph" />
            </td>
</tr>

</form>

          
        </li>
      </ul>
    </div>



    <div class="col-md-8 column">

      <script src="d3.v3.min.js"></script>

<script>


function displayGraph(){

var country = document.getElementById("myCountry").value;
var index = document.getElementById("myIndices").value;
// var countryCombo = document.getElementById("myCountry");
// var indexCombo = document.getElementById("myIndices");
var content = document.getElementById("content");
document.getElementById("body").innerHTML = "";
// document.getElementById("body").appendChild(countryCombo);
// document.getElementById("body").appendChild(indexCombo);
document.getElementById("body").appendChild(content);

// alert(("#myCountry").value);


// Set the dimensions of the canvas / graph
var margin = {top: 30, right: 20, bottom: 30, left: 50},
    width = 1000 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

// Parse the date / time
var parseDate = d3.time.format("%Y").parse;

// Set the ranges
var x = d3.time.scale().range([0, width]);
var y = d3.scale.linear().range([height, 0]);

// Define the axes
var xAxis = d3.svg.axis().scale(x)
    .orient("bottom").ticks(17);

var yAxis = d3.svg.axis().scale(y)
    .orient("left").ticks(15);

// Define the line
var valueline = d3.svg.line()
    .x(function(d) { return x(d.year); })
    .y(function(d) { return y(d.values); });
    
// Adds the svg canvas
var svg = d3.select("body")
    .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
    .append("g")
        .attr("transform", 
              "translate(" + margin.left + "," + margin.top + ")");




    
//remove everything from svg
// document.getElementById("canvas").innerHTML = "";
// svg.remove("0");
// svg.value = "";
// document.getElementById("body").innerHTML = "";


// Get the data



d3.json("data.php?country="+country+"&indices="+index, function(error, data) {
    data.forEach(function(d) {
        d.year = parseDate(d.year);
        d.values = +d.values;
    });

    // Scale the range of the data
    x.domain(d3.extent(data, function(d) { return d.year; }));
    y.domain([0, d3.max(data, function(d) { return d.values; })]);

    // Add the valueline path.
    svg.append("path")
        .attr("class", "line")
        .attr("d", valueline(data));

    // Add the X Axis
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis);

    // Add the Y Axis
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis);

});
}
</script>
</div>











</form>
</div>


<!-- load the d3.js library -->    

</body>

</html> 