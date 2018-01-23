<?php
	$v = "";
	$let = "";
	$desc = "";
	$lenght = 0; 
		
	$input = $_GET['input'];
	$type = $_GET['type'];
	$margin = $_GET['margin'];
	$show_top_level_pathways = $_GET['show_top_level_pathways'];
	$matching_type = $_GET['matching_type'];
	
/*	echo $input."\n";
	echo $type."\n";
	echo $margin."\n";
	echo $show_top_level_pathways."\n";
	echo $matching_type."\n";*/
	
	include "restReader.php";
	
	/*$header_data = array(
		"input"=>"P00519|P31749|P11274|P22681|P22681|P16220|P46109|P27361|Q9UQC2",
		"type"=>"uniprotList",
		"margin"=>"3",
		"show_top_level_pathways"=>"true",
		"matching_type"=>"FLEXIBLE");
	*/
	$header_data = array(
		"input"=>"$input",
		"type"=>"$type",
		"margin"=>"$margin",
		"show_top_level_pathways"=>"$show_top_level_pathways",
		"matching_type"=>"$matching_type");
	
	//print_r ($header_data);
	$responseP =  CallAPI("GET", "http://localhost:8080/pathwayanalysis/bioinformaticsoft/v1_0/analysis", false, $header_data);
	$obj = json_decode($responseP);
	//echo $responseP;
	//$items = $obj->items;
/*	$i = 0;
	foreach ($obj as $key2){
		if ($i > 0){
			if (is_numeric($key2->no_of_entities_found) && $key2->no_of_entities_found >= 0){
				if ($v != ""){
					$v=$v.",";
					$let= $let.",";
					$desc= $desc.",";
				}
				$let = $let."'".$key2->pathway_identifier."'";
				$v = $v.$key2->no_of_entities_found;
				$desc = $desc."'".$key2->pathway_name."'";
				//echo $key2->pathway_name." ".$key2->pathway_identifier."<br>";
			}
		}
		$i++;
		//if ($i==10)break;
	}
	$lenght = $i;*/
	echo json_encode($obj);
	
?>