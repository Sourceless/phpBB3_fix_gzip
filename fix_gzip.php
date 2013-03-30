<?php
/* CONFIGURATION. CHANGE THESE TO YOUR SERVER SETTINGS. */
$db_server   = 'localhost:3306';
$db_username = 'your_mysql_username';
$db_password = 'your_mysql_password';
?>


<!DOCTYPE html>

<html>
    <head>
        <title>phpBB3 gzip fix tool</title>
    </head>

    <body>
        <h1>phpBB gzip fix tool</h1>

        <?php if isset($_GET["confirm"]) {
            echo "
            <p>This script will disable gzip compression in your phpBB3 config to allow you to get back into your admin area if it is unreachable. Clicking the link below will run the mysql query. You can edit the domain, username, and password to be used by editing this file.</p>
            <br />
            <a href='?confirm=1'>Run the fix.</a>";
        } else {
            $db = mysql_connect($db_server, $db_username, $db_password) or die("Couldn't connect.");
            mysql_query("UPDATE phpbb_config SET config_value = 0 WHERE config_name = 'gzip_compress';", $db);
            echo "<p><strong>Fix successful.</strong></p>";
        } ?>

    </body>
</html>
