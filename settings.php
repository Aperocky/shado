<?php
	$page_title='Settings Page';
	$curr_page='runSimPage';
	require_once("header.php");
?>
			<div id="settingsPage" class="page">
				<h1 class="pageTitle">Simulation Settings</h1>
				<form id="taskParameters">
				<!-- action="action_page.php"> -->
				  <!-- <fieldset> -->
						<table>
						  <tr>
								<th>Task Parameter</th>
								<th>Phase 1</th>
								<th>Phase 2</th>
								<th>Phase 3</th>
							</tr>
							<tr>
						    <td>Name:</td>
						    <td colspan="3"><input type="text" name="t0_name" size="20" value=""></td>
						  </tr>
						  <tr>
						    <td>Priority:</td>
						    <td><input type="text" name="t0_priority_p1" size="2" value="1"></td>
								<td><input type="text" name="t0_priority_p2" size="2" value="1"></td>
								<td><input type="text" name="t0_priority_p3" size="2" value="1"></td>
						  </tr>
							<tr>
								<td>
									Mean Arrival Time
									<div class="tooltip">(?)
  								<span class="tooltiptext">Exponential Distribution</span>
									</div>:
								</td>
								<td>Once every <br><input type="text" name="t0_arrTime_p1" size="4" value="10"> mins</td>
								<td>Once every <br><input type="text" name="t0_arrTime_p2" size="4" value="10"> mins</td>
								<td>Once every <br><input type="text" name="t0_arrTime_p3" size="4" value="10"> mins</td>
							</tr>
							<tr>
								<td>
									Mean Service Time
									<div class="tooltip">(?)
  								<span class="tooltiptext">Exponential Distribution</span>
									</div>:
								</td>
								<td><input type="text" name="t0_serTime_p1" size="4" value="0.5"> mins</td>
								<td><input type="text" name="t0_serTime_p2" size="4" value="0.5"> mins</td>
								<td><input type="text" name="t0_serTime_p3" size="4" value="0.5"> mins</td>
							</tr>
							<tr>
								<td>
									Affected by Traffic Levels
									<div class="tooltip">(?)
  								<span class="tooltiptext">Is the arrival of this task affected by lower/higher levels of traffic?</span>
									</div>:
								</td>
								<td>
									<select name="t0_affByTraff_p1">
						      	<option>Yes</option>
						      	<option>No</option>
						     	</select>
								</td>
								<td>
									<select name="t0_affByTraff_p2">
						      	<option>Yes</option>
						      	<option>No</option>
						     	</select>
								</td>
								<td>
									<select name="t0_affByTraff_p3">
						      	<option>Yes</option>
						      	<option>No</option>
						     	</select>
								</td>
							</tr>
							<tr>
								<td>Associated Assistants:</td>
								<td colspan="3">
									<input type="checkbox" name="t0_ops_eng" id="conductor"> Engineer
									<input type="checkbox" name="t0_ops_con" id="conductor"> Conductor
									<input type="checkbox" name="t0_ops_ptc" id="conductor"> Positive Train Control
									<input type="checkbox" name="t0_ops_cc" id="conductor"> Cruise Control
									<input type="checkbox" name="t0_ops_cus" id="conductor"> Custom
								</td>
							</tr>
						</table>
						<p><input TYPE="SUBMIT" VALUE="Submit" NAME="B1"></P>
					<!-- </fieldset> -->
				</form>
			</div>

				    <!-- <legend>Task Information:</legend>
				    Task Priority:
				    <input type="text" name="firstname" size="2" value="1">
				    <br><br>
				    Mean Arrival Time (Exponential Distribution):
				    Once every <input type="text" name="firstname" size="4" value="10">
				    minutes<br><br>
				    Mean Service Time (Exponential Distribution):
				    <input type="text" name="firstname" size="4" value="0.5">
				    minutes<br><br>
				    Task arrival affected by traffic?
				    <select>
				      <option>Yes</option>
				      <option>No</option>
				     </select><br><br>
				    <input type="submit" value="Submit">
				  </fieldset>
				</form>
			</div> -->

<?php
	require_once("footer.php");
?>
