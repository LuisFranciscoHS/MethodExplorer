<!DOCTYPE HTML>
<html>
<head>  
<meta charset="UTF-8">
<!--Comentario prueba 2-->
<!--____________________________________________________NEW LIB-->
<script src="libs/plotly-latest.min.js"></script>
<!--____________________________________________________-->


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script   src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
<script   src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"   integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="   crossorigin="anonymous"></script>
<link rel="stylesheet" href="tableStyle.css">

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">



<script>

////___________________plotly.js
var yAxis = new Array();
var xAxis = new Array();
/////////////////////////////////
	function getRandomColor() {
	  var letters = '0123456789ABCDEF';
	  var color = '#';
	  for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	  }
	  return color;
	}
	
	function drawChart() {
      var data1 = google.visualization.arrayToDataTable(dataT2);

      var view = new google.visualization.DataView(data1);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "# entities found",
        width: 1000,
        height: 350,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
	  
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  
	/*google.charts.load("current", {packages:['corechart']});
	google.charts.setOnLoadCallback(drawChart);*/
	
var dataTableX = new Array();

dataTableX.push(["Element", "#Entities found", { role: "style" }]);
        dataTableX.push(["Copper", 8, getRandomColor()]);
        /*["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
		];*/
	
			
	var dataT = new Array();
	var dataT2 = new Array();
	
	

	var data = "";
	var pagination_TotalRecords = 0;
	var currentPage = 1;
	var from_initial = 1;
	loadForm(1);
	//loadTable(1);
	function loadFilters(significant, noFound){
		//loadTable(1);
		console.log (significant);
		console.log (noFound);
		readData(1, 0, 1, significant, noFound);
		//loadTable(1);
		//loadTable(1, 0);
		
	}
	function loadForm(input){
		 if (input.length == 0) { 
			document.getElementById("main").innerHTML = "";
			return;
		} else {
			 var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					console.log("ok" );
					document.getElementById("main").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "loadForm.php", true);
			xmlhttp.send();
		}
	}
	function loadTable(input){
		 if (input.length == 0) { 
			document.getElementById("main").innerHTML = "";
			return;
		} else {
			 var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					console.log("ok" );
					document.getElementById("main").innerHTML = xmlhttp.responseText;
				}
			};
			xmlhttp.open("GET", "loadTable.php", true);
			xmlhttp.send();
		}
	}
	function getPathwayData(inputType, matchingType, input, margin, show_top_level_pathways){
		loadTable(1);
		//console.log(inputType);
		//console.log(matchingType);
		for (var i = 0; i < input.length; i++){
				input = input.replace("\n", "|");
		}
		//console.log(input);
		//console.log(margin);
		console.log(show_top_level_pathways);
		if (show_top_level_pathways=="on"){
			show_top_level_pathways="true";
		}else{
			show_top_level_pathways="false";
		}
		console.log(show_top_level_pathways);
		 if (input.length == 0) { 
			document.getElementById("main").innerHTML = "";
			return;
		} else {
			 var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					data = xmlhttp.responseText;
					console.log("ok" );
					
					//console.log(data);
					$("#loadIndicator").hide();
					//$("#tab").show();
					readData(1, 0, 0, 0, 0);//without filters
					//document.getElementById("demo").innerHTML = data;
				}
			};
			xmlhttp.open("GET", "getData.php?input="+input+"&type="+inputType+"&margin="+margin+"&matching_type="+matchingType+"&show_top_level_pathways="+show_top_level_pathways, true);
			xmlhttp.send();
		}
	}
	
	//getPathwayData(1);
	//paginationPrepare();
	////SEARCH AND FILTER TABLE

	function searchAndFilters(input) {
		var  filter, table, tr, td, i;
		
		filter = input.value.toUpperCase();
		table = document.getElementById("data");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}       
		}	
	}
	/*Gen pagination*/

	function readData(_from, _size, filters_flag, significant_filter, no_of_entities_found_filter){
		
		//console.log(data);
		var object = JSON.parse(data);
		pagination_TotalRecords = object.length;
		var tr;
		//console.log(object.length);
		//console.log(_from);
	//	console.log(_size);
		////DATA for CHARTS_______________________________________________________
		
		var header_chart = new Array(["Element", "#Entities found", { role: "style" } ]);
		dataT.push(["Element", "#Entities found", { role: "style" }]);
		
		console.log(dataT);
		
		//var dataNew = new Array(["Copper", 8.94, "#b87333"]);
	
		//dataT.push(dataNew);
		//////////////////////////////////
		var labels= new Array();
		for (var i =_from; i < object.length; i++) {
			if (filters_flag == 1){
				if (object[i].significant==significant_filter){
					tr = $('<tr/>');
					tr.append("<td class = \"pathNum\">" + i + "</td>");
					tr.append("<td class = \"pathway_identifier\">" + object[i].pathway_identifier + "</td>");
					tr.append("<td class = \"pathway_name\">" + object[i].pathway_name + "</td>");
					tr.append("<td class = \"no_of_entities_found\">" + object[i].no_of_entities_found + "</td>");
					tr.append("<td class = \"no_of_entities_total\">" + object[i].no_of_entities_total + "</td>");
					tr.append("<td class = \"entities_ratio\" >" + object[i].entities_ratio + "</td>");
					tr.append("<td class = \"entitiesp_value\">" + object[i].entitiesp_value + "</td>");
					tr.append("<td class = \"significant\">" + object[i].significant + "</td>");
					tr.append("<td class = \"entities_fdr\">" + object[i].entities_fdr + "</td>");
					tr.append("<td class = \"no_of_reactions_found\">" + object[i].no_of_reactions_found + "</td>");
					tr.append("<td class = \"no_of_reactions_total\" >" + object[i].no_of_reactions_total + "</td>");
					tr.append("<td class = \"reactions_ratio\" >" + object[i].reactions_ratio + "</td>");
					$('table').append(tr);
				}
			}else{
				tr = $('<tr/>');
				tr.append("<td class = \"pathNum\">" + i + "</td>");
				tr.append("<td class = \"pathway_identifier\">" + object[i].pathway_identifier + "</td>");
				tr.append("<td class = \"pathway_name\">" + object[i].pathway_name + "</td>");
				tr.append("<td class = \"no_of_entities_found\">" + object[i].no_of_entities_found + "</td>");
				tr.append("<td class = \"no_of_entities_total\">" + object[i].no_of_entities_total + "</td>");
				tr.append("<td class = \"entities_ratio\" >" + object[i].entities_ratio + "</td>");
				tr.append("<td class = \"entitiesp_value\">" + object[i].entitiesp_value + "</td>");
				tr.append("<td class = \"significant\">" + object[i].significant + "</td>");
				tr.append("<td class = \"entities_fdr\">" + object[i].entities_fdr + "</td>");
				tr.append("<td class = \"no_of_reactions_found\">" + object[i].no_of_reactions_found + "</td>");
				tr.append("<td class = \"no_of_reactions_total\" >" + object[i].no_of_reactions_total + "</td>");
				tr.append("<td class = \"reactions_ratio\" >" + object[i].reactions_ratio + "</td>");
				$('table').append(tr);
				var NoFound = parseFloat(object[i].no_of_entities_found);
			
				var p_value= parseFloat(object[i].entitiesp_value);
				xAxis.push(i);
				labels.push(object[i].pathway_identifier);
				//xAxis.push(object[i].pathway_identifier);
				yAxis.push(p_value);
			}
			/*if (i == _size){
				break;
			}*/
		}
		////CHARTS_________
		plotData(xAxis, yAxis, labels);
		//////////////////////
		google.charts.load("current", {packages:['corechart']});
			google.charts.setOnLoadCallback(drawChart);
		dataT2 = dataT;//.slice(0, 11);
		//////////////////////////
		$('#data').after('<div id="nav"></div>');
		var rowsShown = 10;
		var rowsTotal = $('#data tbody tr').length;
		var numPages = rowsTotal/rowsShown;
		for(i = 0;i < numPages;i++) {
			var pageNum = i + 1;
			$('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
		}
		
		var startItem;
		var endItem;
		$('#data tbody tr').hide();
		$('#data tbody tr').slice(0, rowsShown).show();
		$('#nav a:first').addClass('active');
		$('#nav a').bind('click', function(){
			
			$('#nav a').removeClass('active');
			$(this).addClass('active');
			var currPage = $(this).attr('rel');
			startItem = currPage * rowsShown;
			endItem = startItem + rowsShown;
			$('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).
			css('display','table-row').animate({opacity:1}, 300);
			///////////////////////////CHARTS_________
			var x = xAxis.slice(startItem, endItem);
			var y = yAxis.slice(startItem, endItem);
			var t = labels.slice(startItem, endItem);
			plotData(x, y, t);
			
			console.log(yAxis);
			////////////////////////////////////////
			
		});
	
		//$('#tb').dataTable().fnReloadAjax();
		//console.dir(object, {depth: null, colors: true})
		
		$("input:checkbox:not(:checked)").each(function() {
		console.log("Not checked.");
		var column = "table ." + $(this).attr("name");
		$(column).hide();
	});

	$("input:checkbox").click(function(){
		var column = "table ." + $(this).attr("name");
		$(column).toggle();
	});
	}
	function nextPage(s){
		if (s < (pagination_TotalRecords / 10)){
			currentPage = s  + 1;
			from_initial = (currentPage * 10) + 1;
			//readData(from_initial, 10);
			console.log("from: " + from_initial);
		}
		
		console.log("Current Page: " + currentPage);
		console.log("Total: " + pagination_TotalRecords);
	}
	function prevPage(s){
		if (s > 1){
			currentPage = s - 1;
		}
		console.log("Current Page: " + currentPage);
		console.log("Total: " + pagination_TotalRecords);
		
	}
	function toggleColumn(n) {
		var currentClass = document.getElementById("mytable").className;
		if (currentClass.indexOf("show"+n) != -1) {
			document.getElementById("mytable").className = currentClass.replace("show"+n, "");
		}
		else {
			document.getElementById("mytable").className += " " + "show"+n;
		}
	}
	
		
</script>

<!--______________________________CHARTS libraries-->
 
   
<!--_________________________________________________________________________________-->

</head>
<body>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Option1</a></li>
        <li><a href="#">Option1</a></li>
        <li><a href="#">Option1</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenav hidden-xs" id = "main2">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">Dashboard</a></li>
        <li><a href="#section2">Opt1</a></li>
        <li><a href="#section3">Opt2</a></li>
        <li><a href="#section3">Opt3</a></li>
      </ul><br>
    </div>
	
    <div class="col-sm-10">
		<div class="row">
			<div id="tester" style="overflow: scroll; height: 350px; background-color:#D4E6F1;">
			
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12" id = "main" style="overflow: scroll; height: 300px;">
				
			</div>
		</div>
    </div>
  </div>
</div>


<script>

function plotData(X, Y, T){
	 var trace1 = {
	  x: X,//['giraffes', 'orangutans', 'monkeys'],
	  y: Y,//[20, 14, 23],
	  name: 'SF Zoo',
	  type: 'bar'
	};
	
	var trace2 = {
  x: X,
  y: Y,
  mode: 'markers',
  type: 'scatter',
  name: 'Team A',
  text: T,
  marker: { size: 12 }
};
	
	var data = [trace2];

	var layout = {barmode: 'group'};

	Plotly.newPlot('tester', data, layout);
}
var trace1 = {
  x: [1, 2, 3],
  y: [4, 5, 6],
  type: 'scatter'
};

var trace2 = {
  x: [20, 30, 40],
  y: [50, 60, 70],
  xaxis: 'x2',
  yaxis: 'y2',
  type: 'scatter'
};

var data = [trace1, trace2];

var layout = {
  xaxis: {domain: [0, 0.45]},
  yaxis2: {anchor: 'x2'},
  xaxis2: {domain: [0.55, 1]}
};


Plotly.newPlot('tester', data, layout);
  </script>
</body>

</html>