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
		<form method = "post" action = "makeloans1.php">
			<p>
                <?php
                    $link = mysql_connect("services1.mcs.sdsmt.edu", "s7285523_f15", "T0d9j9e5KJ") or die("Unable to connect");
                    mysql_select_db("db_7285523_f15") or die ("Unable to select the database");
                    $query = "select distinct patronNo from Patron";
                    $res = mysql_query($query);
                    $num = mysql_numrows($res);
                ?>
                <h2 class="h2-header-form"> Select a Patron</h2>
                <table>
                    <tr>
                        <td valign = top>
                            <select size=<?php echo $num;?> id = "status" name = "status">
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
                     <input type = "submit" value = "Select">
                     <input type = "reset" value = "Clear">
                    <br>
                    <br>
                    <a href = "index.html">Back to main menu</a>
                </p>
            </p>
		</form>
	</body>
</html>
