<?php
require 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Adding items to the shopping cart</title>
    <style type="text/css">

        body{
            background-color: white;
            background-repeat: no-repeat;

        }

        img.first{
            align-items: left;
            border: 20px;
            margin: 10px;
            padding: 10px;

        }

        .button
        {
            font: 20px bold;
            font-weight: bold;
            font-family: sans-serif;
            background-color: whitesmoke;
            text-shadow: 2px 2px lightgray;
            box-shadow: 6px 5px 6px darkgray;
            border: 5px;
            color: black;
            border: 3px solid black;
            border-radius: 5px;
            border-color: black;
            padding: 15px 32px 15px 32px;
            text-align: center;
            text-decoration: none;
            border-bottom-left-radius:5px;
            border-bottom-right-radius: 5px;
            display: inline-block;
            font-size: 16px;
            float: right;
        }

        a:hover{
            color: lightgray;
            font-weight: bold;
            background-color: dimgrey;
            text-shadow: none;
        }

        a:active{
            color: saddlebrown;
            font-weight: bold;
            background-color: black;
            text-shadow: none;
        }

        .header_1
        {
            margin: 1em 0 0.5em 0;
            color: #343434;
            font-weight: normal;
            font-family: 'Ultra', sans-serif;
            font-size: 36px;
            line-height: 42px;
            text-transform: uppercase;
            text-shadow: 0 2px white, 0 3px #777;
        }

        .header_2
        {
            font-family: fantasy;
            font-weight: bold;
            size: 10px;
            font-size: 30px;
            line-height: 40px;
            color: darkorange;
            text-shadow: 2px 3px dimgrey;
            -webkit-text-stroke: 1px black;
        }


    </style>
</head>
<body>
<div style="background-color: darkgrey">

    <a class="button" href=""> Contact us </a>
    <a class="button" href=""> About us </a>
    <a class="button" href=""> sign up </a>
    <a class="button" href=""> Log in </a>
    <a class="button" href=""> Home </a>

    <div>
        <img class="first" src="Online%20book%20Store%20logo.png" width="230px" height="180px" border="20" align="left">
    </div>

    <div>
        <form action="">
            <input type="text" placeholder="search..." name="search">
            <button type="submit" value="search" ><img src="search-icon.png" height="20px" width="20px"> </button>
        </form>
    </div>
    <br/><br/><br/><br/><br/>

    <h1 align="center" class="header_1"> <b>Online Book Store </b></h1>

</div>

<hr/>
<div >
    <img src="shopping_cart.png" height="150px"  width="180px" align="left">
    <h1 class="header_2"> Shopping Cart </h1>
</div>
<br/><br/><br/><br/><br/><br/><br/><br/>

<div align="center">
    <?php

        $query ="SELECT * FROM shopping_cart ORDER BY item ASC";
        $result = mysql_query($query);
        while($row=mysql_fetch_assoc($result))
        {
            echo "<tr>";

            echo "<td>" . $row['item'] . "</td>";

            echo "<td>" . $row['unit_price'] . "</td>";

            echo "</tr>";
        }
    ?>

        <form method='post' action='add_to_cart.php'>
            <td> <input type='text' name='quantity' value='1'> </td>
            <td> <input type='submit' name='add_to_cart' style='margin-top: 5px;' value='Add to Cart'></td>
            <td> <input type='submit' name='delete_from_cart' style='margin-top: 5px;' value='Remove'></td>
            <td><input type='hidden' name='hidden_name' value='<?php echo $row['item']; ?>'></td>
            <td><input type='hidden' name='hidden_price' value='<?php echo $row['unit_price']; ?>'></td>
        </form>";

    <?php

        if(isset($_POST["add_to_cart"]))
        {

            $itemName= $_POST["hidden_name"];
            $itemPrice= $_POST["hidden_price"];
            $itemQuantity=$_POST["quantity"];

        }
        else
        {
            $error ="*** Please fill out all the fields ***";
            echo $error;
        }

        //insert data to the database
        if(isset($_POST["add_to_cart"]))
        {
            $insertData = "INSERT INTO shopping_cart ('item', 'quantity') VALUES ('$itemName', '$itemQuantity')";

            if(!mysql_query($insertData))
            {
                die("Error :" .mysql_error());
            }
            else
            {
                echo "<br/>";
                echo "1 record added successfully";
            }
        }

        //Delete data from database
        if(isset($_POST["delete_from_cart"]))
        {
            $deleteData = "DELETE FROM shopping_cart WHERE item='$itemName'";

            if(!mysql_query($deleteData))
            {
                die("Error :" .mysql_error());
            }
            else
            {
                echo "<br/>";
                echo "1 record successfully deleted from the Shopping Cart";
            }
        }

    ?>
</div>
</body>
</html>