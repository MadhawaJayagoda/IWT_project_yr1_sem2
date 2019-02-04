<?php
    // connect to the database

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_pass = "sliit";

    $mysql_db="cart";

    if(!mysql_connect($mysql_host, $mysql_user, $mysql_pass) || !mysql_select_db($mysql_db))
    {
        die(mysql_error());
    }

    else
    {
        echo "(Successfully connected to the cart Database) <br/><br/><br/>";
    }

?>