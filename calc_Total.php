<?php
require 'db_connect.php';
?>

<html>
<head>
    <title> Total amount calculation</title>
</head>
<body>
    <?php
        $sql = "SELECT SUM(quantity * unit_price) FROM shopping_cart";
        $total = mysql_query($sql);
        echo "  * Your Grand Total is : ". $total . "<br/><br/>";
        echo "<b><I><font color='#ff4500'>*** Please note that the total amount is without shipping chargers. ***</font></I></b>";
    ?>
</body>
</html>