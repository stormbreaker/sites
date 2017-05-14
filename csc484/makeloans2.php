<html>
<head>
		<title>
		Display Loans for Selected Patron
		</title>
	</head>
	<body>
		<form method = "post" action = "makeloans2.php">
			<p>
			<?php

				$link = mysql_connect("services1.mcs.sdsmt.edu", "s7285523_f15", "T0d9j9e5KJ") or die("Unable to connect");

				mysql_select_db("db_7285523_f15") or die ("Unable to select the database");



				$query1 = "select count(title) from Book left join CopyBook on CopyBook.bookNo = Book.bookNo left join Loan on CopyBook.copyNo = Loan.copyNo where Loan.patronNo = '$status'";

				$res1 = mysql_query($query1);

				$num = mysql_numrows($res1);



			?>
			<table>
				<tr>
					<th>
						<strong> Select Patron </strong>
					</th>
				</tr>
				<tr>
					<td valign = top>
						<select size=<?php echo $num;?> id = "status" name = "status">
							<?php
								for ($i = 0; $i < $num; $i++)
								{
									$row=mysql_fetch_row($res1);
									echo "<option> $row[0] </option>";
								}
								mysql_close($link);
							?>

						</select>
					</td>
				</tr>
			</table>

			<p>
			<input type = "submit" value = "Select">
			<input type = "reset" value = "Clear">
			<p>

		</form>
	</body>
</html>
