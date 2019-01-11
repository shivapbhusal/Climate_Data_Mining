<!doctype html>
<html>
    <head>
        
        <title>Brargraph</title>
        
        <link href="../css/bootstrap-combined.css" rel="stylesheet">
        <link href="../css/select2-bootstrap.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/select2.css" rel="stylesheet">
        <script src="../js/jquery-1.js"></script>
        <script src="../js/bootstrap.js"></script>
        <script src="../js/underscore-min.js"></script>
        <script src="../js/select2.js"></script>
        <script src="../js/jsapi.js"></script>
        <link rel="stylesheet" href="../css/main.css">
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
  google.charts.load('current', {
        'packages': ['corechart']
      });

  // Set a callback to run when the Google Visualization API is loaded.
  google.charts.setOnLoadCallback(displayGraph);


  function displayGraph(){
    var country = document.getElementById('myCountry').value;
    var index = document.getElementById('myIndices').value;
    

    var content = document.getElementById("content");
    document.getElementById("chart").innerHTML = "";
    document.getElementById("chart").appendChild(content);

    // These two lines are not needed anymore
    //google.load('visualization', '1', {'packages':['corechart']});
    //google.setOnLoadCallback(drawChart);
   
    function drawChart() {
      var jsonData = $.ajax({
        url: "data.php?&country="+country+"&indices="+index,
        dataType:"json", 
        async: false, 
        success : function(data) {
           
        }
      }).responseText;

     
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      var options = {'title': 'BarGraph of Various Indices',
               'width': 1000,
               'height': 600,
               'chartArea': {left:200,'width': '100%', 'height': '80%'},
               'legend':'top',
                vAxis: {
                    minValue: 0
                    },
                explorer: {
                     maxZoomOut:1,
                     maxZoomIn:4,
                     keepInBounds: true
                     }
    };
     
      chart.draw(data,options);

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
                                <li><a href="../regression/gain_vs_vul.php" >ND Gain VS Readiness </a></li>
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

    <!-- /header -->

	<div class="container">
		<div class="header">
			<h1 >Bar Graph of Various Indices</h1>
			
			<br></br>
		</div>
		
		<ul>
		<div id="chart">
     <div id="content">
     <form action ="" method ="POST">
     <tr id="tableRow">
        <th valign="bottom">Select country:</th>

        <td >   
        <select name="country" id="myCountry" class="select2" >
            
               <option value = "AFG">Afganistan</option>
               <option value = "ALB">Albania</option>
               <option value = "DZA">Algeria</option>
               <option value = "AND">ANDORA</option>
               <option value = "AGO">Angola</option>
               <option value = "ATG">Antigua</option>
               <option value = "ARG">Argentina</option>
               <option value = "ARM">Armenia</option>
               <option value = "AUS">Australia</option>
               <option value = "AUT">Austria</option>
               <option value = "AZR">Azerbaijan</option>
               <option value = "BHS">Bahamas</option>
               <option value = "BHR">Baharain</option>
               <option value = "BGD">Bangladesh</option>
               <option value = "BRB">Barbados</option>
               <option value = "BLR">Belarus</option>

                <option value = "BEL">Belgium</option>
               <option value = "BLZ">Belize</option>
               <option value = "BEN">Benin</option>
               <option value = "BTN">Bhutan</option>
               <option value = "BOL">Bolivia</option>
               <option value = "BIH">Bosnia Herzegovina</option>
               <option value = "BWA">Botswana</option>
               <option value = "BRA">Brazil</option>
               <option value = "BRN">Brunai</option>
               <option value = "BGR">Bulgaria</option>
               <option value = "BFA">Burkina Faso</option>
               <option value = "BDI">Burundi</option>
               <option value = "KHM">Combodia</option>
               <option value = "CMR">Cameron</option>
               <option value = "CAN">Canada</option>
               <option value = "CPV">Cape Verde</option>
                <option value = "CAF">Central african republic</option>
               <option value = "TCD">Chad</option>
               <option value = "CHL">Chile</option>
               <option value = "CHN">China</option>
               <option value = "COL">Colombia</option>
               <option value = "COM">Comoros</option>
               <option value = "COG">Congo</option>
               <option value = "COD">Congo DRC</option>
               <option value = "CRI">Costa Rica</option>
               <option value = "CIV">Ivory Coast</option>
               <option value = "HRV">Croatia</option>
               <option value = "CUB">Cuba</option>
               <option value = "CYP">Cyprus</option>
               <option value = "CZE">Czech republic</option>
               <option value = "DNK">Denmark</option>
               <option value = "DJI">Djibouti</option>

                <option value = "DMA">Dominica</option>
               <option value = "DOM">Dominican republic</option>
               <option value = "ECU">Ecuador</option>
               <option value = "EGY">Egypt</option>
               <option value = "SLV">El Salvador</option>
               <option value = "ENQ">Equitorial Guinea</option>
               <option value = "ERI">Eritrea</option>
               <option value = "EST">Eustonia</option>
               <option value = "ETH">Euthopia</option>
               <option value = "FJI">Fiji</option>
               <option value = "FIN">Finland</option>
               <option value = "FRA">France</option>
               <option value = "GAB">Gabon</option>
               <option value = "GMB">Gambia</option>
               <option value = "GEO">Georgia</option>
               <option value = "DEU">Germany</option>
               <option value = "GHA">Ghana</option>
               <option value = "GRC">Greece</option>
               <option value = "GRD">Grenada</option>
               <option value = "GTM">Guate Mala</option>
               <option value = "GIN">Guinea</option>
               <option value = "GNB">Guinea Bissau</option>
               <option value = "GUY">Guyana</option>
               <option value = "HTI">Haiti</option>
               <option value = "HND">Hondorus</option>
               <option value = "HUN">Hungery</option>
               <option value = "ISL">Iceland</option>
               <option value = "IND">India</option>
               <option value = "IDN">Indonesia</option>
               <option value = "IRN">Iran</option>
               <option value = "IRQ">Iraq</option>
               <option value = "IRL">Irland</option>

                <option value = "ISR">Israel</option>
               <option value = "ITA">Italy</option>
               <option value = "JAM">Jamaica</option>
               <option value = "JPN">Japan</option>
               <option value = "JOR">Jordan</option>
               <option value = "KAZ">Kazakhastan</option>
               <option value = "KEN">Kenya</option>
               <option value = "KIR">Kiribati</option>
               <option value = "PRK">Korea : north</option>
               <option value = "KOR">Korea: SOuth</option>
               <option value = "KWT">Quwait</option>
               <option value = "KGZ">Kyrgyzstan</option>
               <option value = "LAO">LAOS</option>
               <option value = "LVA">Latvia</option>
               <option value = "LBN">Lebanon</option>
               <option value = "LSO">Lesotho</option>
                <option value = "LBR">Liberia</option>
               <option value = "LBY">Libia</option>
               <option value = "LIE">Liechtenstein</option>
               <option value = "LTU">Lithuwania</option>
               <option value = "LUX">Luxembourg</option>
               <option value = "MDG">madagascar</option>
               <option value = "MWI">Malawi</option>
               <option value = "MIS">Malaysia</option>
               <option value = "MDV">Maldives</option>
               <option value = "MLI">Mali</option>
               <option value = "MLT">Malta</option>
               <option value = "MHL">Marshall Island</option>
               <option value = "MRT">Mautania</option>
               <option value = "MUS">Mauritius</option>
               <option value = "MEX">Mexico</option>
               <option value = "FSM">Micronesia</option>

                <option value = "MDA">Maldova</option>
               <option value = "MCO">Monaco</option>
               <option value = "MKD">Macedonia</option>
               <option value = "MNG">Mongolia</option>
               <option value = "MNE">Monte Negro</option>
               <option value = "MAR">Moracco</option>
               <option value = "MOZ">Mozambique</option>
               <option value = "MMR">Myanmar</option>
               <option value = "NAM">Namibia</option>
               <option value = "NRU">Nauru</option>
               <option value = "NPL">NEPAL</option>
               <option value = "NLD">Netherlands</option>
               <option value = "NZL">New zealand</option>
               <option value = "NIC">Nicaragua</option>
               <option value = "NER">Niger</option>
               <option value = "NGA">Nigeria</option>
               <option value = "NOR">Norwey</option>
               <option value = "OMN">OMAN</option>
               <option value = "PAK">Pakistan</option>
               <option value = "PLW">PALAU</option>
               <option value = "PAM">Panama</option>
               <option value = "PNG">Papua New Guinea</option>
               <option value = "PRY">Paraguay</option>
               <option value = "PER">Peru</option>
               <option value = "PHL">Philipinnes</option>
               <option value = "POL">Poland</option>
               <option value = "PRT">Portugal</option>
               <option value = "QAT">Quatar</option>
               <option value = "ROU">Romania</option>
               <option value = "RUS">Russian Federation</option>
               <option value = "RWA">Rwanda</option>
               <option value = "KNA">Saint Kitties and Nevis</option>

                <option value = "LCA">Saint Lucia</option>
               <option value = "">Saint Vincent and Grenadines</option>
               <option value = "WSM">Samoa</option>
               <option value = "SMR">San Marino</option>
               <option value = "STP">Sao toma and principa</option>
               <option value = "SAU">Saudi Araebia</option>
               <option value = "SEN">Senegal</option>
               <option value = "SRB">Serbia</option>
               <option value = "SYC">Seychelles</option>
               <option value = "SLE">Sierraleone</option>
               <option value = "SGP">Singapore</option>
               <option value = "SVK">Slovakia</option>
               <option value = "SVN">Slovenia</option>
               <option value = "SLB">Solomon Island</option>
               <option value = "SOM">Somalia</option>
               <option value = "ZAF">South Africa</option>
                <option value = "ESP">Spain</option>
               <option value = "LKA">Srilanka</option>
               <option value = "SDN">Sudan</option>
               <option value = "SUR">Surinam</option>
               <option value = "SWZ">Swaziland</option>
               <option value = "SWE">Swedan</option>
               <option value = "CHE">Switzerland</option>
               <option value = "SYR">Sirean arab republic</option>
               <option value = "TJK">Tazkistan</option>
               <option value = "TZA">Tanzania</option>
               <option value = "THA">Thailand</option>
               <option value = "TLS">Timor</option>
               <option value = "TGO">Togo</option>
               <option value = "TON">Tonga</option>
               <option value = "TTO">Trinand and Tobagao</option>
               <option value = "TUN">Tuinesia</option>

                <option value = "TUR">Turkey</option>
               <option value = "TKM">Turkamenistan</option>
               <option value = "TUV">Tuvalu</option>
               <option value = "UGA">Uganda</option>
               <option value = "UKR">Ukraine</option>
               <option value = "ARE">UAE</option>
               <option value = "GBR">United Kingdom</option>
               <option value = "USA">United states</option>
               <option value = "URY">Uruguay</option>
               <option value = "UZB">Uzbekistan</option>
               <option value = "VUT">Vanuaty</option>
               <option value = "VEN">Venzuela</option>
               <option value = "VNM">Vietnam</option>
               <option value = "YEM">Yemen</option>
               <option value = "ZMB">Zambia</option>
               <option value = "ZWE">Zimbabwe</option>


            </select>
            
        </td>
        <th valign="bottom">Select parameters:</th>
        <td >   
        <select name="indices" id="myIndices" class="" >
            
               <option value= "gainfinal">ND gain </option> 
            <option value= "overallvfinal">Overall vulnerability </option>
             <option value= "finaloverallr">Overall Readiness </option>
              <option value= "foodfinal">Vulnerability on food</option>
             <option value= "waterfinal">Vulnerability on water </option>
             <option value= "ecosystemfinal">Vulnerability on ecosystem </option>
             <option value= "habitatfinal">Vulnerability on habitat </option>
             <option value= "infrafinal">Vulnerability on infrastructure </option>
             <option value= "healthfinal">Vulnerability water </option>
              <option value= "socialfinal">Social readiness </option>
             <option value= "governancefinal">Governance readiness </option>
              <option value= "economicfinal">Economic readiness </option>
              <option value= "carbonfinal">Carbon Emission </option>

            </select>
            
        </td>
        <td valign="top">
            
            <input id="action" class="btn btn-success btn-large" onclick="displayGraph();" value="Display Graph"/>
            </td>
</tr>

</form>
<script>
$(document).ready(function() { $("#myCountry").select2({ width: 'resolve' }); });
$(document).ready(function() { $("#myIndices").select2({ width: 'resolve' }); });
</script>
<div id="chart_div"></div>
</div>
</div>
</div>

</body>
</html>