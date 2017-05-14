<html>
    <head>
        <title>Manage Patrons</title>
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
    </head>
    <body>
        <div class="site-header">
            <div class="site-wrapper">
                <h1 id="site-logo-text">Library Database Management</h1>
                <h3 id="site-logo-subtext">Andrew Fagrey and Benjamin Kaiser</h3>
            </div>
        </div>
        <div>
            <?php
            /* Connect to MySQL */ 
            $link = mysql_connect ("services1.mcs.sdsmt.edu", "s7285523_f15", "T0d9j9e5KJ")or
              die("Unable to connect");

            /* Select the database */
              mysql_select_db("db_7285523_f15") or die("Unable to select the database");

            /* Access the VIDEOFORRENT table */
             $result = mysql_query("Select * from Patron"); 
            ?>
            <table Border="1">
                <tr>
                <?php
                /* Fetch and display the attribute names */
                while ($field=mysql_fetch_field($result))
                {
                   echo "<th>";
                   echo "$field->name";
                   echo "</th>";
                }
                echo "</tr>";

                /* Fetch and displays each row of $result */ 
                if($result)
                   while($row=mysql_fetch_row($result))
                   {
                      echo "<tr>";
                      for ($i=0; $i < mysql_num_fields($result); $i++)
                      {
                         echo "<td> $row[$i] </td>";
                      }
                      echo "</tr>\n";
                   }

                mysql_close($link);
            ?>
                
            </table>
        </div>
        <a href = "index.html">Back to main menu</a>
    </body>
</html>
