<!DOCTYPE html>
<meta charset="utf-8">
<style>

body {
  font: 10px sans-serif;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.dot {
  stroke: #000;
}

</style>
<body>
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
        <th valign="bottom">Seleect next country:</th>
        <td >   
        <select name="countryone" id="myCountryone" class="">
            
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
        <th valign="bottom">Select next country:</th>
        <td >   
        <select name="countrytwo" id="myCountrytwo" class="">
            
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

      
        <td valign="top">
            <input type="button" class="action" onclick="displayGraph()" value="DisplayGraph" />
            </td>
</tr>

</form>
</div>
<script src="d3.v3.min.js"></script>
<script>
function displayGraph(){

var country = document.getElementById("myCountry").value;
var countryone = document.getElementById("myCountryone").value;
var countrytwo = document.getElementById("myCountrytwo").value;
// var countryCombo = document.getElementById("myCountry");
// var indexCombo = document.getElementById("myIndices");
var content = document.getElementById("content");
document.getElementById("body").innerHTML = "";
// document.getElementById("body").appendChild(countryCombo);
// document.getElementById("body").appendChild(indexCombo);
document.getElementById("body").appendChild(content);


var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 960 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var x = d3.scale.linear()
    .range([0, width]);

var y = d3.scale.linear()
    .range([height, 0]);

var color = d3.scale.category10();

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left");

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.json("scatterdata.php?country="+country+"&countryone="+countryone+"&countrytwo="+countrytwo, function(error, data) {
  data.forEach(function(d) {
    d.gainindex = +d.gainindex;
    d.readinessindex = +d.readinessindex;
  });

  x.domain(d3.extent(data, function(d) { return d.readinessindex; })).nice();
  y.domain(d3.extent(data, function(d) { return d.gainindex; })).nice();

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .append("text")
      .attr("class", "label")
      .attr("x", width)
      .attr("y", -6)
      .style("text-anchor", "end")
      .text("Readiness index (0-1)");

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("class", "label")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("ND Gain ( 0-100)")

  svg.selectAll(".dot")
      .data(data)
    .enter().append("circle")
      .attr("class", "dot")
      .attr("r", 3.5)
      .attr("cx", function(d) { return x(d.readinessindex); })
      .attr("cy", function(d) { return y(d.gainindex); })
      .style("fill", function(d) { return color(d.countrycode); });

  var legend = svg.selectAll(".legend")
      .data(color.domain())
    .enter().append("g")
      .attr("class", "legend")
      .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

  legend.append("rect")
      .attr("x", width  +10)
      .attr("width", 25)
      .attr("height", 18)
      .style("fill", color);

  legend.append("text")
      .attr("x", width +5)
      .attr("y", 9)
      .attr("dy", ".35em")
      .style("text-anchor", "end")
      .text(function(d) { return d; });

});
}

</script>
