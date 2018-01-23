<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PathwayMatcher</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class= "row">
	<div class = "col-sm-5">
		<div>
			<form id="analysis" action="" method="post">
				<label for="inputType">Sample type:</label>
				<select id="inputType">
					<option value="geneList">Genes</option>
					<option value="rsidList">Genetic variants - RsId</option>
					<option value="vcf">Genetic variants - VCF</option>
					<option value="peptideList">Peptides</option>
					<option value="uniprotList">Proteins - UniProt Accessions</option>
					<option value="ensemblList">Proteins - Ensembl</option>
					<option value="uniprotListAndModSites">Proteoforms</option>
				</select>

				<label for="matchingType">Matching type:</label>
				<select id="matchingType">
					<option value="strict">Strict</option>
					<option value="flexible">Flexible</option>
					<option value="one">At least one in common</option>
				</select>

				<label for="input">Sample data:</label><br/>
				<textarea id="input" required rows="15">
		P20823
		P01308
		P41235
		P35557
		P54259
		P37231
		Q9NQB0
		P02649
		P02741
		Q14654
				</textarea>

				<label for="margin">Site margin:</label>
				<output name="marginValue" id="marginValueId">3</output>
				<input id="margin" type="range"
					   value="3"
					   min="0" max="15" oninput="marginValue.value = margin.value"/>
				<input type="checkbox" id="showTopLevelPathways" checked align="right"> Show top level pathways

				<br/>

				<input type="submit" data-submit="...Analysing" value="Analyse"></input>
			</form>
			<script type="tex">
				function updateMarginValue(val) {
				  document.getElementById('marginValue').value=val;
				}
			</script>
		</div>
	</div>
	<div class = "col-sm-5">
	otra columna
	</div>
</div>
<div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</div>
</body>
</html>