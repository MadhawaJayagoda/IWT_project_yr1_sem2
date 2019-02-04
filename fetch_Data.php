<?php
    require 'db_connect.php';
?>

<html>
<head>
    <title> Items in the Shopping Cart</title>
</head>
<body>
    <table width="600" border="1" cellpadding="1" cellspacing="1">
        <tr>
            <th> Date of Order </th>
            <th> Product ID </th>
            <th> Item </th>
            <th> Quantity </th>
            <th> Price </th>
        </tr>
    </table>

    <?php
        $sql = "SELECT * FROM shopping_cart";
        $records = mysql_query($sql);

        while($employee=mysql_fetch_assoc($records))
        {
            echo "<tr>";

            echo "<td>" . $employee['date_added'] . "</td>";

            echo "<td>" . $employee['product_id'] . "</td>";

            echo "<td>" . $employee['item'] . "</td>";

            echo "<td>" . $employee['quantity'] . "</td>";

            echo "<td>" . $employee['unit_price'] . "</td>";

            echo "</tr>";
        }

    ?>
</body>