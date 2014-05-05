<?php

session_start();

?>
<html>
  <head>
     <title>PHP Test</title>
  </head>
  <body>
     <?php
     
       if (isset($_SESSION['logged_in'])) {
         session_destroy();
         echo "<p>You are now logged out!</p>";
       }
       else 
       {
         echo "<p>You weren't logged in to begin with...</p>";
       }
       
      
     ?>
  </body>
</html>
