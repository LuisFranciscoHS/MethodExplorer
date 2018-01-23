<?php
//<div class = \"col-sm-0\"></div>
//<a href=\"#\" class=\"close\" data-dismiss=\"panel\" aria-label=\"close\" id=\"hide\">&times;</a>
echo "
	<div class = \"col-sm-12\" id = \"form\">
		
			
			<form>
			<div class=\"row\">
				<div class=\"col-sm-4\">
					<div class=\"form-group\">
						<label for=\"inputType\">Sample type:</label>
						<select class=\"form-control\" id=\"inputType\">
									<option value=\"geneList\">Proteins</option>
									<option value=\"rsidList\">Genetic variants - RsId</option>
									<option value=\"vcf\">Genetic variants - VCF</option>
									<option value=\"peptideList\">Peptides</option>
									<option value=\"uniprotList\">Proteins - UniProt Accessions</option>
									<option value=\"ensemblList\">Proteins - Ensembl</option>
									<option value=\"uniprotListAndModSites\">Proteoforms</option>
						</select>
					</div>
					<div class=\"form-group\">
						<label for=\"margin\">Site margin:</label>
						<output name=\"marginValue\" id=\"marginValueId\">3</output>
						<input id=\"margin\" type=\"range\"
							   value=\"3\"
							   min=\"0\" max=\"15\" oninput=\"marginValue.value = margin.value\"/>
						<input type=\"checkbox\" id=\"showTopLevelPathways\" checked align=\"right\"> Show top level pathways
					</div>	
				</div>
				<div class=\"col-sm-4\">
					<div class=\"form-group\">
							<label for=\"input\">Sample data:</label><br/>
							<textarea  class=\"form-control\" id=\"input\" required rows=\"10\">
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
					</div>
				</div>
				<div class=\"col-sm-4\">
					<div class=\"form-group\">
						<label for=\"matchingType\">Matching type:</label>
						<select class=\"form-control\" id=\"matchingType\">
							<option value=\"strict\">Strict</option>
							<option value=\"flexible\">Flexible</option>
							<option value=\"one\">At least one in common</option>
						</select>
					</div>
				</div>	
				<div class=\"row\">
					
					<div class=\"col-sm-4\" align=\"right\">
						<button  type=\"submit\" class=\"btn btn-primary\" onclick=\"getPathwayData(
							document.getElementById('inputType').value,
							document.getElementById('matchingType').value,
							document.getElementById('input').value,
							document.getElementById('margin').value, 
							document.getElementById('showTopLevelPathways').value); return false;\">Submit</button>
					</div>
				</div>	
			</div>
			
			</form>
		</div>";
?>