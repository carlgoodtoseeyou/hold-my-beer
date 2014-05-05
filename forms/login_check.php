<?php
session_start();
if (isset($_SESSION['logged_in'])){
    echo "You are logged in<br/>";
}else{
echo "You are not logged in<br/>";
}
?>
