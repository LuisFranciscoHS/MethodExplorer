<?php
echo "
	<div class = \"col-sm-12\">
		<form class=\"form-inline\">
		  <div class=\"form-group\">
			<label for=\"significant\">Significant</label>
			<select class=\"form-control\" id=\"significant\">
				<option value=\"Yes\">Yes</option>
				<option value=\"No\">No</option>
			</select>
		  </div>
		  <div class = \"form-group\">
			<label for = \"noreactionsfound\"># reactions found</label>
			<input type=\"checkbox\" id=\"noreactionsfound\" > Show the 10 highest
		  </div>
		  <button type=\"submit\" class=\"btn btn-primary\" onclick=\"loadFilters(
				document.getElementById('significant').value,
				document.getElementById('noreactionsfound').value); return false;\">Submit</button>
		</form>
	</div>
";
?>