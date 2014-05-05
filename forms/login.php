<style media="screen" type="text/css">
            form{
                border: 2px solid #ccc;
                padding:20px;
                display: inline-block;
            }
            input{
                border-radius: 4px;
                padding:4px;
                border: 2px solid #ccc;
                box-shadow: inset 1px 1px 2px rgba( 0,0,0,0.1);
            }
            label{
                display: inline-block;
                width:100px;
            }
        </style>
<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL); ini_set('display_errors', 1);

require_once "/home/carlton/public_html/PHPproject/allincludes.php";

if ($_POST){
    $form = $_POST;
    $username = $form['username'];
    $password = $form['password'];
    $hash_obj = new PasswordHash(8, false);
    
    $dbresponse = $db->getConnection()->query("SELECT password, isadmin  FROM users WHERE username='$username'");
    $data=$dbresponse->fetch();
    $stored_hash = $data['password'];
    $isadmin = $data['isadmin'];

            
    $check = $hash_obj->CheckPassword($password, $stored_hash);
    if($check){
        echo "Login successful!<br/>";
        $_SESSION['logged_in'] = true;
         echo '<a href="addbeer.php"> Add your first beer! </a>';
         
        if ($isadmin='y'){
            $_SESSION['admin_logged_in'] = true;
            print_r("<br>All hail the admin!</br>");
        
        }
    }else{
        echo "Authentication failed. Please try again.";
    }
    
    
    //login here
}
else{
?>
<form name="login" action="login.php" method="POST">
    <label for "username">Username: </label>
    <input type="text" name="username"/><br />
    <label for "password">Password: </label>
    <input type="password" name="password"/><br />
    <button type="submit">Submit</button>
    <button type="reset">Reset Form</button>
</form>
<?php
}
?>
