<?php

session_start();

if ($_SESSION['logged_in']!="yes"){
    header ("Location: unauth.php");
    exit();
}
require_once "/home/carlton/public_html/PHPproject/allincludes.php";
?>      
<h4> So you tried a new beer..tell me about it</h4>

    <form action="beeradded.php" method="post">
        Please enter a beer:<br>
        <input name="beer_name" type="text" />
        <br>
        Type of beer:<br>
        <input type="text" name="beer_type">
        <br>
        Beer ABV: <br>
        <input type="number" name="beer_abv">
        <br>
        Rate beer from 1 to 10: <br>
        <input type="number" name="beer_rating"> 
        <br>
 <input type="submit" value='Add Beer' />
</form>
