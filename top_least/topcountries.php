<html>

<script type="text/javascript" src="include/jsapi"></script>
    <script type="text/javascript" src="include/jquery.min.js"></script>
    <script type="text/javascript">
  // Load the Visualization API and the piechart package.
  google.load('visualization', '1', {'packages':['corechart']});

  // Set a callback to run when the Google Visualization API is loaded.
  google.setOnLoadCallback(displayGraph);


  function displayGraph(){
    var year = document.getElementById('myYear').value;
    var index = document.getElementById('myIndices').value;
    

    var content = document.getElementById("content");
    document.getElementById("body").innerHTML = "";
    document.getElementById("body").appendChild(content);

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
      chart.draw(data, {width: 1000, height: 600});
    }

    // Since we removed the on-load callback we need to call drawChart manually
    drawChart();
  }
</script>

  <body id="body">
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
<div id="chart_div"></div>
</div>

</body>
     

  <!--Load the AJAX API-->
    
</html>