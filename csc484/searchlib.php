<html>
	<head>
		<title>Search System</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
        <div class="site-header">
            <div class="site-wrapper">
                <h1 id="site-logo-text">Library Database Management</h1>
                <h3 id="site-logo-subtext">Andrew Fagrey and Benjamin Kaiser</h3>
            </div>
        </div>
        <form method = "post" action = "searchlib1.php">
			<p>
			<?php
				$link = mysql_connect("services1.mcs.sdsmt.edu", "s7285523_f15", "T0d9j9e5KJ") or die("Unable to connect");
				mysql_select_db("db_7285523_f15") or die ("Unable to select the database");
				$query = "select distinct title from Book order by title asc";
				$res = mysql_query($query);
				$num = mysql_numrows($res);
			?>
            </p>
            <h2 class="h2-header-form"> Select Book </h2>
			<table>
				<tr>
					<td valign = top>
						<select class="select-boxes" size=<?php echo $num;?> id = "status" name = "status">
							<?php
								for ($i = 0; $i < $num; $i++)
								{
									$row=mysql_fetch_row($res);
									echo "<option> $row[0] </option>";
								}
								mysql_close($link);
							?>
						</select>
					</td>
				</tr>
			</table>
			<p>
			     <input type = "submit" value = "Select" class="input-button">
			     <input type = "reset" value = "Clear" class="input-button">
            </p>
		</form>
	</body>	
</html>
