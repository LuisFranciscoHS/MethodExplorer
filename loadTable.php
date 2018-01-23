<?php
echo "
<div class = \"col-sm-12\" id = \"tab\"  > 
			
			<div >
				<p>
				<input type=\"checkbox\" name=\"no_of_entities_total\" checked=\"checked\" > # entities total
				<input type=\"checkbox\" name=\"entities_ratio\"> Entities ratio
				<input type=\"checkbox\" name=\"entitiesp_value\" > Entitiesp value
				<input type=\"checkbox\" name=\"significant\" > Significant
				<input type=\"checkbox\" name=\"entities_fdr\" > Entities fdr
				<input type=\"checkbox\" name=\"no_of_reactions_found\" > # reactions found
				<input type=\"checkbox\" name=\"no_of_reactions_total\" > # reactions total
				<input type=\"checkbox\" name=\"reactions_ratio\" > # reactions ratio
				<a href=\"javascript:loadForm(1);\" >New query</a>
				</p>
			</div>
		<div id = \"dataView\">
			<table id =\"data\" class=\"table\">
			  <thead>
				<tr>
				  <th class = \"pathNum\" scope=\"col\" >#</th>
				  <th class = \"pathway_identifier\" scope=\"col\">Pathway id</th>
				  <th class = \"pathway_name\" scope=\"col\">Pathway name</th>
				  <th class = \"no_of_entities_found\" scope=\"col\"># entities found</th>
				  <th class = \"no_of_entities_total\" scope=\"col\" ># entities total</th>
				  <th class = \"entities_ratio\" scope=\"col\">Entities ratio</th>
				  <th class = \"entitiesp_value\" scope=\"col\">Entitiesp value</th>
				  <th class = \"significant\" scope=\"col\">Significant</th>
				  <th class = \"entities_fdr\" scope=\"col\">Entities fdr</th>
				  <th class = \"no_of_reactions_found\" scope=\"col\"># reactions found</th>
				  <th class = \"no_of_reactions_total\" scope=\"col\"># reactions total</th>
				  <th class = \"reactions_ratio\" scope=\"col\">reactions ratio</th>
				</tr>
			  </thead>
			   <tbody>
			   </tbody>
			</table>
		</div>
		</div>
	</div>
	<div id = \"loadIndicator\" align=\"center\">";
		include "loadIndicator.php";
	echo "</div>";
	include "loadFilters.php";
?>