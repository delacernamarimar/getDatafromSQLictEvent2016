<?php
		$message="Enter Student";
		if(isset($_GET['message'])) {
			$message=$_GET['message'];
		}
?>
<!doctype html5>
<html>
	<head></head>
	<body>
		<fieldset>
			<legend>REGISTER STUDENT</legend>
			<form method="post" action="updatestudent.php">
				<table>
					<tr>
						<td align="center">
							<strong><?php echo $message ?></strong>
						</td>
					</tr>
					<tr>
						<td>TICKET NUMBER</td>
						<td>
							<input type="text" name="ticketNo">
						</td>
					</tr>
					<tr>
						<td>IDNO</td>
						<td>
							<input type="text" name="idno">
						</td>
					</tr>
					<tr>
						<td>FAMILY NAME</td>
						<td>
							<input type="text" name="familyName">
						</td>
					</tr>
					<tr>
						<td>FIRST NAME</td>
						<td>
							<input type="text" name="firstName">
						</td>
					</tr>
					<tr>
						<td>COURSE</td>
						<td>
							<select name="course">
								<option>---</option>
								<option>BSIT</option>
								<option>BSCS</option>
								<option>ACT</option>
								<option>BSIS</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="SUBMIT">
							<input type="reset" value="CANCEL">
						</td>
					</tr>
				</table>
			</form>
		</fieldset>
	</body>
</html>