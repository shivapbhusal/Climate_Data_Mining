<!DOCTYPE html>
<html> 
<meta charset="utf-8">
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

<body class="page">
<div id="wrap">
  <div id="header">
    <h1 color = green><a href="#">हाम्रो   पृथ्वी </a></h1>
    <div id="nav">
      <ul class="menu">
        <li class="current_page_item"><a href="index.html">Home</a></li>
        <li><a href="maps.php">Maps</a></li>
        <li><a href="index.html">Graphs</a>
          <ul class="sub-menu">
            <li><a href="index.html">Line Graphs</a></li>
            <li><a href="#">Bar Graphs</a></li>
          </ul>
        </li>
        <li><a href="index.html">Scatterplots</a>
          <ul class="sub-menu">
            <li><a href="index.html">Carbon VS ND GAin Index</a></li>
            <li><a href="#">ND Gain VS Vulnerability </a></li>
            <li><a href="#">ND Gain VS Readiness </a></li>
          </ul>
        </li>
        <li><a href="index.html">Regression</a>
          <ul class="sub-menu">
            <li><a href="index.html">Carbon VS ND GAin Index</a></li>
            <li><a href="#">ND Gain VS Vulnerability </a></li>
            <li><a href="#">ND Gain VS Readiness </a></li>
          </ul>
        </li>
        <li><a href="index.html">Prediction</a></li>
        <li><a href="index.html">Anomalies</a></li>
      </ul>
    </div>
<body id="body">
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
            
        </td>
        <th valign="bottom">Select parameters:</th>
        <td >   
        <select name="indices" id="myIndices" class="">
            
             <option value= "foodfinal">Vulnerability on food</option>
             <option value= "waterfinal">Vulnerability on water </option>
             <option value= "ecosystemfinal">Vulnerability on ecosystem </option>
             <option value= "habitatfinal">Vulnerability on habitat </option>
             <option value= "infrafinal">Vulnerability on infrastructure </option>
             <option value= "healthfinal">Vulnerability water </option>
             <option value= "overallvfinal">Overall vulnerability </option>
             <option value= "gainfinal">ND gain </option>
             <option value= "socialfinal">Social readiness </option>
             <option value= "governancefinal">Governance readiness </option>
              <option value= "economicfinal">Economic readiness </option>

             

            </select>
            
        </td>
        <td valign="top">
            <input type="button" class="action" onclick="displayGraph()" value="DisplayGraph" />
            </td>
</tr>

</form>
</div>


<!-- load the d3.js library -->    
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
</body>

</html> 