<!DOCTYPE html>
<meta charset="utf-8">

<head>
	<style>

	.axis {
	  font: 10px sans-serif;
	}

	.axis path,
	.axis line {
	  fill: none;
	  stroke: green;
	  stroke-width: 2;
	  shape-rendering: crispEdges;
	}

	</style>
</head>

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
             <option value= "ALB">Albania</option>
             <option value= "AND">Andora</option>
             <option value = "CAN">Canada</option>


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

var margin = {top: 20, right: 20, bottom: 70, left: 40},
    width = 1200 - margin.left - margin.right,
    height = 600 - margin.top - margin.bottom;

// Parse the year / time
var	parseyear = d3.time.format("%Y").parse;

var x = d3.scale.ordinal().rangeRoundBands([0, width], .20);

var y = d3.scale.linear().range([height, 0]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")
    .tickFormat(d3.time.format("%Y"));

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .ticks(15);

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
  .append("g")
    .attr("transform", 
          "translate(" + margin.left + "," + margin.top + ")");

d3.json("data.php?country="+country+"&indices="+index, function(error, data) {

    data.forEach(function(d) {
        d.year = parseyear(d.year);
        d.values = +d.values;
    );
	
  x.domain(data.map(function(d) { return d.year; }));
  y.domain([0, d3.max(data, function(d) { return d.values; })]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis)
    .selectAll("text")
      .style("text-anchor", "end")
      .attr("dx", "-.8em")
      .attr("dy", "-.55em")
      .attr("transform", "rotate(-90)" );

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
    .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("Index values");

  svg.selectAll("bar")
      .data(data)
    .enter().append("rect")
      .style("fill", "brown")
      .attr("x", function(d) { return x(d.year); })
      .attr("width", x.rangeBand())
      .attr("y", function(d) { return y(d.values); })
      .attr("height", function(d) { return height - y(d.values); });

});

}
</script>

</body>
