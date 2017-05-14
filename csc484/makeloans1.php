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
                    $status = $_POST['status'];
                    $query = "select title from Book";
                    $query1 = "select count(loanNo) from Loan where patronNo = '$status'";
                    $res = mysql_query($query);
                    $res1 = mysql_query($query1);
                    $temp = mysql_fetch_row($res1);
                    $num = mysql_numrows($res);
                    $num1 = $temp[0];
                ?>
                <h2 class="h2-header-form">Select a Book</h2>
                <table>
                    <tr>
                        <td valign = top>
                            <?php
                                if ($num1 < 3)
                                {
                                    ?> <select size=<?php echo $num; ?> id = title name = title>
                                    <?php
                                    for ($i = 0; $i < $num; $i++)
                                    {
                                        $row=mysql_fetch_row($res);
                                        echo "<option> $row[0] </option>";
                                    }
                                    ?>
                                    </select>
                                    <?php
                                    if (isset($_POST['title']))
                                    {

                                        $query2 = "select max(loanNo) from Loan";
                                        $num2 = mysql_query($query2);
                                        $row = mysql_fetch_row($num2);
                                        $max = $row[0] + 1;

                                        $patron = $_POST['patron'];
                                        $title = $_POST['title'];
                                        $query2 = "select * from CopyBook left join Book on Book.bookNo = CopyBook.bookNo where Book.title = '$title'";
                                        $res3 = mysql_query($query2);
                                        $row1 = mysql_fetch_row($res3);
                                        $query3 = "insert into Loan (loanNo, copyNo, patronNo, checkOutDate, dueDate) values ('$max', '$row1[0]', '$patron', curdate(), date_add(curdate(), interval 21 day))";
                                        $res5 = mysql_query($query3);
                                    }
                                }
                                else
                                {
                                    echo "Cannot loan out!!!";
                                }
                                mysql_close($link);
                            ?>
                        </td>
                    </tr>
                </table>
                <p>
                    <input type = "text" value = <?php echo $status; ?> name = "patron">
                    <input type = "submit" value = "Select">
                    <input type = "reset" value = "Clear">
                    <br>
                    <a href = "index.html">Back to main menu</a>
                </p>
            </p>
		</form>
	</body>
</html>
