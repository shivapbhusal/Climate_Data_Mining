<!doctype html>
<html>
<head>
	
	<title>NDGAIN Index (1995-2011)</title>
	
	<link href="../css/bootstrap-combined.css" rel="stylesheet">
	<script src="js/jquery-1.js"></script>

	<link href="../graph/select2-bootstrap.css" rel="stylesheet">
	<script src="js/bootstrap.js"></script>
	<script src="js/underscore-min.js"></script>
	<script src="js/d3.js"></script>
		<link href="../graph/select2.css" rel="stylesheet">
	 <link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/font-awesome.min.css">
<script src="../graph/select2.js"></script>
	<script type="text/javascript" src="prettify/prettify.js"></script>
	<link href="prettify/prettify.css" rel="stylesheet" type="text/css" />

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
		
		

		noscript {
			font-size: 2em;
		}
		.form-search {
			margin-top: 30px;
			padding-top: 15px;
		}
		#year-nav {
			text-align: right;
			padding-top: 30px;
			display:inline-block;
			letter-spacing: 1px;
		}
		#the-year {
			display:inline-block;
			margin-top: 19px;
			font-size: 2em;
		}
		.year-label {
			font-size: 1.5em;
			stroke: none;
			stroke-size: 0;
			fill: #444;
		}
		.year-nav {
			fill: steelBlue;
		}
		.container {
			width: 960px;
			position: relative;


		}
		#footer {
			text-align: center;
			padding: 20px 0;
		}
		
		#chart {
			position: relative;

		}
		#info {
			
			position: absolute;
			background-color: rgba(255,255,255,0.8);
			overflow: hidden;
			padding: 4px;
			left: 40px;
			bottom: 100px;
			height: 150px;
			width: 120px;
		}
		
		
		#info .divider {
			margin: 10px 0;
		}
		
		#instructions {
			
		}
		#more {
			text-align: center;
			padding: 30px;
			opacity: 0.3;
		}
		#about p, #about ul {
			font-size: 1.2em;
			line-height: 1.5em;
			margin-bottom: 1em;
		}
		svg {
     	border:1px solid #ccc;
     	-webkit-touch-callout: none;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
    }
    #countries {
    	fill: white;
    }
    .background {
    	fill: white;
    	stroke: none;
    	stroke-width: 0;
    }
    .country {
    	fill: #f5f5f5;
      stroke: #fff;
    }
    .gdp {
    	stroke: brown;
    	stroke-width: 0.4px; 
    }
    #undefined path {
    	fill: none;
    	stroke: #c3c3c3;
    	stroke-width: 1px;
    	stroke-linejoin: 'miter';
    	stroke-linecap: 'square';
    }
    #undefined .background {
    	fill: #e4e4e4;
    	stroke: none;
    	stroke-width: 0;
    }
    #timeline rect {
    	fill: white;
    	stroke: none;
    	stroke-width: 0;
    	opacity: 0.8;
    }
    #timeline path {
    	stroke: steelBlue;
    	fill: steelBlue;
    	stroke-width: 2px;
    }
    #timeline .year-marker {
    	stroke: white;
    	stroke-width: 1px;
    	fill: steelBlue;
    }
    #timeline .year-tick {
    	stroke: none;
    	stroke-width: 0;
    	fill: white;
    }
    #timeline .year-tick-label {
    	fill: steelBlue;
    	font-size: 1em;
    	cursor: pointer;
    }
    .legend text {
    	fill: #333333;
    }
    .locator {
    	fill: none;
    	stroke: darkSlateGrey;
    	stroke-width: 1px;
    	shape-rendering: crispEdges;
    	opacity: 0.8;
    }
	</style>
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
                                <li><a href="index.php">Vulnerability</a></li>
                                <li><a href="index2.php">Readiness Index</a></li>
                                <li><a href="ndgain.php"> ND Gain</a></li>

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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Multiple Graphs<i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../multiplegraphs/multibar.php">Multiple BarGraph</a></li>
                                <li><a href="../multiplegraphs/multiline.php">Multiple LineGraph</a></li>
                                
                            </ul>
                             <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Comparison<i class="icon-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="../comparison/linechart.php">Compare By Line Graph</a></li>
                                <li><a href="../comparison/barchart.php">Compare By Bar Graph</a></li>
                                
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
                                <li><a href="../anomaly/aline.php">Anomaly Score Calculation</a></li>
                                <li><a href="../anomaly/pline.php">P Value Calculation </a></li>
                                
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

    <!-- /header -->

	<div class="container">
		<div class="header">
			<h1 class="headingc">ND Gain Indices</h1>
			<h3>1995-2011</h3>
			<form class="form-search pull-right">
			  <div class="input-append">
			    <input type="text" class="span2 search-query" placeholder="Find a country" data-provide="typeahead" autocomplete="on">
			    <button type="submit" class="btn">Search</button>
			  </div>
			</form>
		</div>
		<div>
		<div id="content">
<form action ="" method ="">
<tr id="tableRow"></p></p></p>

         <th valign="bottom">Select parameters:</th></p>
        <td >   
        <select name="indices" id="myIndices" align =""class="">
            
             
             
             <option value= "gainfinal">NG gain index</option>
             
             >
     
             
            </select>
            
        </td>


        <td valign="bottom">
            <input type="button" class="action" onclick="displayGraph()" value="DisplayGraph" />
            </td>
</tr>

</form>
		   
		</div>
		<ul>
		<div id="chart">
			<script>
			displayGraph();
// });
function displayGraph(){

var index = document.getElementById("myIndices").value;
var content = document.getElementById("content");
document.getElementById("chart").innerHTML = "";
				// 3rd party utilities
				d3.loadData = function() {
	        // Source: http://bl.ocks.org/ilyabo/2209220
	        // To simultaneously loading multiple datasets

	        var loadedCallback = null;
	        var toload = {};
	        var data = {};
	        var loaded = function(name, d) {
	          delete toload[name];
	          data[name] = d;
	          return notifyIfAll();
	        };
	        var notifyIfAll = function() {
	          if ((loadedCallback != null) && d3.keys(toload).length === 0) {
	            loadedCallback(data);
	          }
	        };
	        var loader = {
	          json: function(name, url) {
	            toload[name] = url;
	            d3.json(url, function(d) {
	              return loaded(name, d);
	            });
	            return loader;
	          },
	          csv: function(name, url) {
	            toload[name] = url;
	            d3.csv(url, function(d) {
	              return loaded(name, d);
	            });
	            return loader;
	          },
	          onload: function(callback) {
	            loadedCallback = callback;
	            notifyIfAll();
	          }
	        };
	        return loader;
	      };

	      Array.prototype.equijoin || (Array.prototype.equijoin = 
					function(source,options) {
						// add the contents in source to destination (copy of this) where
						// source.(options.sourceKey) = destination.(options.destKey)
						// first match only is used

						// when adding properties to destination from source,
						// if destination already has that property, prefix is
						// added to property's name. if dest already has property prefix+name,
						// it is overwritten

						// if pack is specified, the contents of source will be added
						// to the property pack on destination and not to destination itself

						// runs O(n^2) ~ improvements?

						var sourceKey = (options||{}).sourceKey || "id";
						var destKey = (options||{}).destKey || "id";
						var prefix = (options||{}).prefix || "_";
						var pack = (options||{}).pack;

						var results = [];

						for ( var i = 0; i < this.length; i++ ) {
							var combination = {};
							var subgroup = {};
							var target;
							var pair;
								
							// always copy this into combined object
							for ( prop in this[i] ) {
								if ( this[i].hasOwnProperty(prop) ) {
									combination[prop] = this[i][prop];
								}
							}

							// if this has no property for destKey, don't look for a join
							if ( typeof this[i][destKey] === 'undefined') {
								results.push(combination);
								continue;
							}

							// if we are grouping the source properties under an attribute
							if ( pack ) target = subgroup;
							else target = combination;

							// copy source into combined object if we found one
							pair = source.simpleWhere(sourceKey,this[i][destKey]);
							if ( typeof pair !== 'undefined' ) {
								for ( prop in pair ) {
									if ( pair.hasOwnProperty(prop) ) {
										if ( prop == sourceKey ) {
											; // continue
										} else if ( target.hasOwnProperty(prop) ) {
											target[prefix+prop] = pair[prop];
										} else {
											target[prop] = pair[prop];
										}
									}
								}
							}

							// adjoin the subgroup if instructed, but only if not empty, otherwise
							// leave undefined. yes yes, factor or use underscore
							if ( pack ) {
								var empty = true;
								for (var key in target ) { if (target.hasOwnProperty(key)) { empty = false; break; } }
								if (!empty) combination[pack] = target;
							}

							results.push(combination);
						}
						return results;
					});

				Array.prototype.simpleWhere || (Array.prototype.simpleWhere =
					function(property,value) {
						var result = undefined;
						for ( var i = 0; i < this.length; i++ ) {
							if ( this[i][property] == value ) {
								result = this[i];
								break;
							}
						}
						return result;
					});

				function objectify(list, values) {
					// Source: http://underscorejs.org/
					
					// Converts lists into objects. Pass either a single array of [key, value]
  				// pairs, or two parallel arrays of the same length -- one of keys, 
  				// and one of the corresponding values.

			    if (list == null) return {};
			    var result = {};
			    for (var i = 0, l = list.length; i < l; i++) {
			      if (values) {
			        result[list[i]] = values[i];
			      } else {
			        result[list[i][0]] = list[i][1];
			      }
			    }
			    return result;
			  };

			  function makeRange(from,to) {
			  	// Generate a range of numbers inclusive
			  	var r = new Array();
			  	for ( var i = from; i <= to; i++ ) {
			  		r.push(i);
			  	}
			  	return r;
			  }

			  // begin charting

			  // state
				var year = 2001,
						selectedCountry,
						centered;

				var w = 960,
        		h = 500,
        		timelineXMargin = 40;
        		timelineYMargin = 30;

        // chart components
        var combinedData,
        		gdp,
        		timeline,
        		timeRange,
        		locator,
        		legend;

        var byRegion,
       		 	byName;
        
        var projection = d3.geo.mercator()
		        .translate([480, 300])
		        /*.scale(960)*/;

		    var path = d3.geo.path()
        		.projection(projection);

        var color = d3.scale.linear()
				    .domain([20, 50, 100])
				    .range(["#dd1f2e", "#e4e4e4", "#05a454"]);


				var growthIn = function(obj,year) {

					return obj.gdp ? obj.gdp[year] : undefined;
				} 

       	var growthLabel = function(d,y) {
       		var growth = growthIn(d,y);
					if (typeof growth === 'undefined' || growth.length == 0 ) {
						return d.properties.name + ": " + "Unavailable" + "Year : " +  String(y);

					}

			var indexc = Number(growthIn(d,y)).toFixed(2);
			var status = "";

							

			if(indexc>=65)
			{
       		status="High Vulnerable";
       		}
       		else if (indexc>=40)
       		{
       			status="Moderate Vulnerable";
       		}
       		else if (indexc>=20)
       		{
       			status="High Vulnerable";
       		}
       		else
       		{
       			status="unavailable";
       		}
       		return d.properties.name + ": " 
       			+ String(Number(growthIn(d,y)).toFixed(2)) 
       			+ "\n"
       			+ "Year: " + String(y)
       			+"\n"
       			+ status;
       	}

       	var growthColor = function(d,y) {
       		var growth = growthIn(d,y);
					if (typeof growth === 'undefined' || growth.length == 0 ) {
						return "url(#undefined)"; // webkit doesn't handle patterns well
						//return '#e4e4e4';
					}
					return color(Number(growth).toFixed(1));
       	}

       	// line for the year plot at the bottom of the chart

       	var tx = d3.scale.linear()
    				.range([timelineXMargin, w-timelineXMargin]);

    		var xAxis = d3.svg.axis()
				    .scale(tx)
				    .orient("bottom");

				var tline = d3.svg.line()
    				.x(function(d) { return tx(d); })
    				.y(function(d) { return h - timelineYMargin; });

				// getting to the map itself

        var svg = d3.select("#chart").append("svg")
        		.attr("width", w)
        		.attr("height", h);

        // striped pattern for unavailable data

        var naPattern = svg.append('defs')
        	.append('pattern')
        		.attr('id', 'undefined')
        		.attr('patternUnits', 'userSpaceOnUse')
        		.attr('x', 0)
        		.attr('y', 0)
        		.attr('width', 4)
        		.attr('height', 4);
        naPattern.append('rect')
      			.attr('class','background')
      			.attr('x', 0)
        		.attr('y', 0)
        		.attr('width', 4)
        		.attr('height', 4);
        naPattern
        		.append('path')
        		.attr('d', 'M 0 4 4 0');

        // background to capture stray clicks for zoom out

        svg.append("rect")
				    .attr("class", "background")
				    .attr("width", w)
				    .attr("height", h)
				    .on("click", mapdblclick);

			 	// the primary data grouping

				var g = svg.append('g').attr('id','countries');

				d3.loadData()
		      .json('countries', 'world-countries.json')
		      .csv('codes', 'country-codes.csv')
		      .json('gdp', "data2.php?&indices="+index)
		      .onload(function(thegoods) {
		      	
		      	combinedData = thegoods.countries.features.equijoin(thegoods.codes, {
			    		sourceKey: '2code',
							destKey: 'id'
			    	}).equijoin(thegoods.gdp, {
			    		sourceKey: 'Country Code',
			    		destKey: '3code',
			    		pack: 'gdp'
			    	});

			    	// there is some problem with the polygon data for Antarctica
			    	combinedData = _.filter(combinedData, function(x) {
			    		return x.id != 'AQ';
			    	});

			    	// two slightly different approaches
			    	byRegion = thegoods.gdp.slice(0,32);
			    	byName = (function() {
			    		var rez = {};
			    		combinedData.forEach(function(d) {
			    			rez[d.properties.name.toLowerCase()] = d;
			    		});
			    		return rez;
			    	})();

						timeRange = makeRange(1995,2011); // temp hardcoded
						tx.domain(d3.extent(timeRange, function(d) { return d; }));

						// the map - yup, that's it

						gdp = g.selectAll('.gdp')
								.data(combinedData)
								.enter().append("path")
									.attr('id', function(d) { return d.id; })
									.attr('class','gdp')	
									.attr('fill', function(d) { return growthColor(d,year); })
									.attr('stroke', '##fff')
									.attr("d",path)
									.on("click", mapclick)
									.on("dblclick", mapdblclick)
									.append("title")
										.text(function(d) { return growthLabel(d,year); });

						// the rest of the code here prepares the custom interface
						// the timeline

						timeline = svg.append('g')
								.attr('id','timeline')
								.attr('style','z-index:99;');
						
						timeline.append('rect')
					 			.attr('x',0)
					 			.attr('y',h - timelineYMargin )
					 			.attr('width',w)
					 			.attr('height',timelineYMargin);

						timeline.append('path')
								.attr('d',tline(timeRange));

						var tgs = timeline.selectAll('.year-marker')
								.data(timeRange)
								.enter().append('g')
									.attr('class','year-group')
									.attr('id', function(d) { return 'year'+String(d); })
									.on("click",timeclick);

						tgs.append("circle")
								.attr('class','year-marker')
								.attr("cx", function(d) { return tx(d); }) 
								.attr("cy", function(d) { return h-timelineYMargin; }) 
								.attr("r",4);
								
						tgs.filter(function(d,i) { return (d%5); })
								.append('circle')
									.attr('class','year-tick')
									.attr("cx", function(d) { return tx(d); }) 
									.attr("cy", function(d) { return h-timelineYMargin; }) 
									.attr("r",2);

						timeline.selectAll('.year-tick-label')
								.data(timeRange.filter(function(d){ return !(d%5); }))
								.enter().append("text")
									.attr('class','year-tick-label')
									.attr('text-anchor','middle')
									.attr("x", function(d) { return tx(d); }) 
									.attr("y", function(d) { return h-timelineYMargin+20; }) 
									.on("click",timeclick)
									.text(function(d){ 
										if ( d%100==0 ) return String(d);
										return "'"+String(d).slice(2); 
									});

						timeline.selectAll(".year-group") 
								.on("mouseover", function(d){
									d3.select(this).select('.year-marker')
										.transition() 
										.attr("r",6);
								})
								.on("mouseout", function(d){
									var r = d3.select(this).classed('selected') ? 6 : 4;
									d3.select(this).select('.year-marker') 
										.transition() 
										.attr("r",r);
								});

						timeline.select('#year'+String(year))
								.classed('selected',true)
								.select('.year-marker')
									.style('fill','#2e5270')
									.attr('r',6);

						timeline.append('text')
								.text(String(year))
								.attr('class','year-label')
								.attr("text-anchor", "middle")
								.attr('x',w/2)
								.attr('y',h-50);

						// would be lovely to know the length of the strings in advance

						timeline.append('a')
								.attr('xlink:href','#')
								.attr('id','previous-year')
								.attr('class','year-nav')
								.on('click',navigatePrevious)
								.append('text')
									.attr("text-anchor", "end")
									.text('Previous')
									.attr('x',w/2+5)
									.attr('y',h-10);

						timeline.append('a')
								.attr('xlink:href', '#')
								.attr('id','next-year')
								.attr('class','year-nav')
								.on('click',navigateNext)
								.append('text')
									.attr("text-anchor", "start")
									.text('Next')
									.attr('x',w/2+15)
									.attr('y',h-10);

						// locator from search

						locator = g.append('g')
								.attr('class','locator');

						locator.append('svg:line')
								.attr('transform','translate(-10,0)')
								.style("stroke-dasharray", ("3, 3"))
								.attr('class','x-loc')
								.attr("x1", 0)
						    .attr("y1", 0)
						    .attr("x2", 0)
						    .attr("y2", h);

						locator.append('svg:line')
								.attr('transform','translate(0,-10)')
								.style("stroke-dasharray", ("3, 3"))
								.attr('class','y-loc')
								.attr("x1", 0)
						    .attr("y1", 0)
						    .attr("x2", w)
						    .attr("y2", 0);

						// the legend

						var growthPoints = makeRange(-6,6);
						var ly = h-timelineYMargin-30; // 30
						var lc = 750;

						legend = g.append('g') // svg
								.attr('class','legend');

						legend.append('rect')
								.attr('fill','white')
								.style('opacity',0.1)
								.attr('x',lc-120)
								.attr('y',ly-25)
								.attr('width',300)
								.attr('height',50);
						legend.selectAll('.growth-points')
								.data(growthPoints)
								.enter().append('rect')
									.attr('x',function(d) { return lc + d*10; })
									.attr('fill',function(d) { return color(d*15+20); })
									.attr('y',ly)
									.attr('width',9)
									.attr('height',10);
						legend.append('text')
								.attr('x',lc-80)
								.attr('y',ly-9)
								.attr('text-anchor','start')
								.text('Rate of growth');
						legend.append('text')
								.attr('x',lc-70)
								.attr('y',ly+9)
								.attr('text-anchor','end')
								.style('font-size','0.9em')
								.text(' 80');
						legend.append('text')
								.attr('x',lc+75)
								.attr('y',ly+9)
								.attr('text-anchor','start')
								.style('font-size','0.9em')
								.text('30');
						legend.append('rect')
								.attr('fill','url(#undefined)')
								.attr('x',lc+105)
								.attr('y',ly)
								.attr('width',10)
								.attr('height',10);
						legend.append('text')
								.attr('x',lc+120)
								.attr('y',ly+9)
								.text('n/a');

							$('.i-country').text("20-40 : High Vulnerable");
							$('.i-country-gdp').text("40-60: MOderate Vulnerable");
							$('.i-country-mean').text("60-80 : Least Vulnerable")
							

					 	// prep typeahead for country search
					 	
					 	$('.search-query').typeahead({
					 		source: combinedData.map(function(d) { 
					 			return d.properties.name; 
					 		})
					 	});

					 	// update the info display

						updateGlobalInfo(year);
						updateCountryInfo(selectedCountry,year);
						d3.select('#info').style('display','block');


						// but lets show some instructions, shall we?

						$('.i-country-gdp').text($('#instructions').text());
					 	
				}); // end d3.loadData

				function timeclick(d) {
					transitionToYear(year=d);
					return false;
				}

				function mapclick(d) {
				  updateCountryInfo(d,year);
				  selectedCountry = d;
				  
				}

				function mapdblclick(d) {
				  // Source: http://bl.ocks.org/mbostock/2206590
				  // why is the adjustment 120/60 necessary? ~20-25% of translation
				  var x = 0,
				      y = 0,
				      k = 1;

				  if (d && centered !== d) {
				    var centroid = path.centroid(d);
				    x = -centroid[0] + 120;
				    y = -centroid[1] + 60;
				    k = 4;
				    centered = d;
				  } else {
				    centered = null;
				  }

				  d3.select('#countries').selectAll(".gdp")
				      .classed("active", centered && function(d) { return d === centered; });

				  d3.select('#countries')
				  		.transition()
				      .duration(1000)
				      .attr("transform", "scale(" + k + ")translate(" + x + "," + y + ")");

				  updateCountryInfo(d,year);
				  selectedCountry = d;
				}

				function navigatePrevious() {
					if ( year-1 < timeRange[0] ) return;
					transitionToYear(--year);
					return false;
				}

				function navigateNext() {
					if ( year+1 > timeRange[timeRange.length-1] ) return;
					transitionToYear(++year);
					return false;
				}

				function transitionToYear(y) {
					// delay the map transition to set a starting value for undefined
					// fills. otherwise the pattern is replaced by black first
					// webkit flickers when transitioning from pattern to pattern
					
					function colorCheck() {	
						if ( d3.select(this).attr('fill') == 'url(#undefined)' ) {
							d3.select(this).attr('fill', '#e4e4e4');
						}
					}

					g.selectAll('.gdp')
						.transition().delay(1).duration(1000)
						.each("start", colorCheck)
						.attr('fill', function(d) { return growthColor(d,y); });
					g.selectAll('.gdp')
						.select('title')
						.text(function(d) { return growthLabel(d,y); });

					timeline.select('.selected')
						.classed('selected',false)
						.select('.year-marker')
							.transition().delay(1).duration(1000)
							.style('fill','steelBlue')
							.attr('r',4);
					timeline.select('#year'+String(y))
						.classed('selected',true)
						.transition().delay(1).duration(1000)
						.select('.year-marker')
							.style('fill','#2e5270')
							.attr('r',6);
					timeline.select('.year-label')
						.transition()
						.duration(1000)
						.text(String(year));

					updateGlobalInfo(y);
					updateCountryInfo(selectedCountry,y);
				}

				$('.form-search').submit(function() {
					var name = $('.search-query').val().toLowerCase();
					var obj = byName[name];
					if ( selectedCountry == obj && typeof selectedCountry !== 'undefined' ) {
						// on 2nd+ search for same item, zoom in and out
						mapdblclick(obj);
					}
					revealCountry(obj);
					return false;
				});

				$('.search-query').on('change', function (e) { 
					var name = $('.search-query').val().toLowerCase();
					var obj = byName[name];
					revealCountry(obj);
					return false;
				});

				function revealCountry(obj) {
					var x,y,opacity;
					
					var features = obj;
					
					if ( typeof obj === 'undefined' ) {
						// clear the selection
						x = y = -10;
						opacity = 0;
					} else {
						// center on the country
						var centroid = path.centroid(obj);
				    x = centroid[0];
				    y = centroid[1];
				    opacity = 0.8;
					}

					if ( typeof x !== 'undefined' ) {
						d3.select('.x-loc')
				    	.transition()
				    	.duration(1000)
				    	.attr('transform','translate('+x+',0)')
				    	.style('opacity',opacity);
				    d3.select('.y-loc')
				    	.transition()
				    	.duration(1000)
				    	.attr('transform','translate(0,'+y+')')
				    	.style('opacity',opacity);
				   }

				   updateCountryInfo(obj,year);
				   selectedCountry = obj;
				}

				function updateGlobalInfo(y) {
					var globalGDP = byRegion.simpleWhere('Country Code','WLD');
					var growth = Number(globalGDP[y]).toFixed(1);
					$('.i-year').text("Year: "+String(y));
					$('.i-global-gdp').text("Global Index: "+String(growth)+"");
					
				}

				
				function availableDataForCountry(obj) {
					if ( !obj || !obj.gdp ) return undefined;
					var available = [];
					for (var property in obj.gdp) {
						if ( !obj.gdp.hasOwnProperty(property) )
							continue;
						if ( isNaN(Number(property)) )
							continue;
						if ( obj.gdp[property].length == 0 )
							continue;
						if ( isNaN(Number(obj.gdp[property])) )
							continue;
						available.push({
							year: property,
							growth: obj.gdp[property]
						});
					}
					return available;
				}

			}
			</script>
			<noscript>
				
			</noscript>
			<!-- overlay an html info area upon the graph. svg doesn't handler
					 text wrapping so well, and I stuggled to get foreignObjects
					 working -->
			<div id="info">
				<div class="global">
					<span class="i-year"></span><br>
					<span class="i-global-gdp"></span><br>
				</div>
				<div class="divider"></div>
				<div class="local">
					<span class="i-country"></span><br>
					<span class="i-country-gdp"></span><br>
					<span class="i-country-mean"></span><br>
					<span class="i-period"></span>
				</div>
			</div>
		</div> 
		<!-- end chart -->
		<div id="instructions">
			Select a year to see changes. 
			Hover to a country to see its growth.
			Double click to zoom.
		</div>
		
	</ul>
	<script>

$(document).ready(function() { $("#myIndices").select2({ width: 'resolve' }); });
</script>
	<script>
	  !function ($) {
	    $(function(){
	      window.prettyPrint && prettyPrint()   
	    })
	  }(window.jQuery)
	
	</script>

</body>
</html>