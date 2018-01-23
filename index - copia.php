<!DOCTYPE HTML>
<html>
<head>  
<meta charset="UTF-8">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
<body>
<div>
<?php
$v = "";
$let = "";
$desc = "";
include "restReader.php";

$responseP =  CallAPI("GET", "http://localhost:8080/pathwayanalysis/bioinformaticsoft/v1_0/analysis", false);
$obj = json_decode($responseP);


$items = $obj->items;
$i = 0;
foreach ($items as $key2){
	if ($i > 0){
		if (is_numeric($key2->no_of_entities_found) && $key2->no_of_entities_found >= 0){
			if ($v != ""){
				$v=$v.",";
				$let= $let.",";
				$desc= $desc.",";
			}
			$let = $let."'".$key2->pathway_identifier."'";
			$v = $v.$key2->no_of_entities_found;
			$desc=$desc."'".$key2->species_name."'";
		}
	}
	$i++;
	if ($i==10)break;
}
echo $let."<br>";
echo $v."<br>";
echo $desc;
?>
</div>
<div style="padding: 15px">
    <div style="width: 1200px; height: 300px" id="cvs"></div>
</div>

<script>
printGraph();
function printGraph(){
    bar =  new RGraph.SVG.Bar({
        id: 'cvs',
        data: [<?php echo $v;?>],
        options: {
            gutterTop: 50,
            gutterBottom: 75,
            hmargin: 10,
            xaxisLabels: [
                <?php echo $let; ?>
            ],
            tooltips: [<?php echo $desc;?>],                
            title: 'Pathway report',
            titleSubtitle: 'This is a test',
            titleSubtitleItalic: true,
            colors: ['red','pink'],
            shadow: true,
            shadowOpacity: 0.2
        }
    }).draw();
}

</script>
</body>
</html>