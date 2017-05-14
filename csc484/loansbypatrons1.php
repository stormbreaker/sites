<html>
	<head>
		<title>Display Loans for Selected Patron</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
        <div class="site-header">
            <div class="site-wrapper">
                <h1 id="site-logo-text">Library Database Management</h1>
                <h3 id="site-logo-subtext">Andrew Fagrey and Benjamin Kaiser</h3>
            </div>
        </div>
			<?php $status = $_POST['status'];?>            
            <h2 class="h2-header-form"> <?php echo "Titles Checked Out by $status"; ?> </h2>
            <?php $link = mysql_connect("services1.mcs.sdsmt.edu", "s7285523_f15", "T0d9j9e5KJ") or die("Unable to connect");
			mysql_select_db("db_7285523_f15") or die("Unable to select the database");
			$query = "select title from Book left join CopyBook on CopyBook.bookNo = Book.bookNo left join Loan on CopyBook.copyNo = Loan.copyNo where Loan.patronNo = '$status'";
			$result = mysql_query($query);
			?>
			<table border="1">
                <tr>
                <?php while($field = mysql_fetch_field($result))
                    {
                        echo "<th>$field->name</th>";
                    } ?> 
                </tr>
                <?php if($result)
				{
					while($row = mysql_fetch_row($result))
					{
						echo "<tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++)
						{
							echo "<td>$row[$i]</td>";
						}
						echo "</tr>";
					}
				}
				mysql_close($link);	?>
            </table>
			<a href = "index.html">Back to main menu</a>
	</body>
</html>
