<html>
    <head>
        <title>Update Patrons</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="site-header">
            <div class="site-wrapper">
                <h1 id="site-logo-text">Library Database Management</h1>
                <h3 id="site-logo-subtext">Andrew Fagrey and Benjamin Kaiser</h3>
            </div>
        </div>
        <form method="post" action="manage.php">
            <?php $link = mysql_connect("services1.mcs.sdsmt.edu", "s7285523_f15", "T0d9j9e5KJ") or die("Unable to connect");
                mysql_select_db("db_7285523_f15") or die("Unable to select the database");
            if (!isset($_POST['id']))
            {
                $id=0;
            }
            else
            {
                $id = $_POST['id'];
            }

            if (isset($_POST['left']))
            {
                $query = "select patronNo, patronName from Patron where patronNo < $id order by patronNo desc";
                $res = mysql_query($query);
                $row = mysql_fetch_row($res);
                if ($row[0] > 0)
                {
                    $id = $row[0];
                    $pname = $row[1];
                }
            }

            elseif (isset($_POST['right']))
            {
                $query = "select patronNo, patronName from Patron where patronNo > $id order by patronNo asc";
                $res = mysql_query($query);
                $row = mysql_fetch_row($res);
                if ($row[0] > 0)
                {
                    $id = $row[0];
                    $pname = $row[1];
                }
            }

            elseif (isset($_POST['search']))
            {
                $id = 0;
                $pname = $_POST['pname'];
                $query = "select patronNo, patronName from patron where patronName  like '%$pname%' and patronNo > $id";
                $res = mysql_query($query);
                $row = mysql_fetch_row($res);

                if ($row[0] > 0)
                {
                    $id = $row[0];
                    $pname = $row[1];
                }
            }

            elseif (isset($_POST['add']))
            {
                $pname = $_POST['pname'];
                $query = "insert into Patron (patronNo, patronName) values ('$id', '$pname')";
                $res = mysql_query($query);
                $message = "****RECORD ADDED****";
            }

            elseif (isset($_POST['delete']))
            {
                $query = "delete from Patron where patronNo = $id";
                $res = mysql_query($query);
                $message = "****RECORD DELETED****";
            }

            elseif (isset($_POST['update']))
            {
                $pname = $_POST['pname'];
                $query = "update Patron set patronName='$pname' where patronNo = $id";
                $res = mysql_query($query);
                $message = "****RECORD UPDATED****";
            }

            $pname = trim($pname);
            mysql_close($link);
            ?>

            <br> Patron Number:
            <br><input type = "text" name = "id" <?php echo "value=\"$id\""?>>
            <br>
            <br> Patron Name:
            <br><input type = "text" name = "pname" <?php echo "value=\"$pname\""?>>
            <input type = "submit" name = "left" value = "<">
            <input type = "submit" name = "right" value = ">">
            <input type = "submit" name = "search" value = "Search">
            <input type = "submit" name = "add" value = "Add">
            <input type = "submit" name = "update" value = "Update">
            <input type = "submit" name = "delete" value = "Delete">
            <?php
            if (isset($_POST['message']))
            {
                echo "<br><br>$message";
            }
            ?>
            <br><br>
            <a href = "index.html">Return to main menu</a>
        </form>
    </body>
</html>
