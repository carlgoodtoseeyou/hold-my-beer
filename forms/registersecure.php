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
ini_set('display_errors', 1);
error_reporting(E_ALL); ini_set('display_errors', 1);
 
require_once "/home/carlton/public_html/PHPproject/allincludes.php";
   
if (empty($_POST)){

?>
 <form name="registration" action="registersecure.php" method="POST">
<label for "username">Username: </label>
<input type="text" name="username"/><br />
<label for "password">Password: </label>
<input type="password" name="password"/><br />
<label for "fname">First Name: </label>
<input type="text" name="fname"/><br />
<label for "lname">Last name: </label> 
<input type="text" name="lname"/><br />
<label for "email">Email: </label>
<input type="text" name="email"/><br />
<button type="submit">Submit</button>
</form>
<?php 
}
else {
    
    $form = $_POST;
    $username = $form['username'];
    $password = $form['password'];
    $fname = $form['fname'];
    $lname = $form['lname'];
    $email = $form['email'];
    $hash_obj = new PasswordHash(8, false);
    $hash = $hash_obj->HashPassword($password);
    
    //empty array for errors
    $error = array();
    
    //validate username
    if (empty($_POST['username'])){
        $error['username'] = 'Username empty.';
    }
    elseif (strlen($_POST['username'])>=41){
        $error['username'] = 'Username too long. Cannot be more than 40 characters.';
    }
    else { 
        $sql = "SELECT 1 FROM users WHERE username = :username";
        $query = $db->getConnection()->prepare($sql);
        $query->execute(array(':username'=>$_POST['username']));
        $result = $query->fetch();
        if(!empty($result)){
            $error['username'] = 'Username already exists.';
        }
    }
    
    //validate first name
    if (empty($_POST['fname'])){
        $error['first name'] = 'First name empty.';
    }
    elseif (strlen($_POST['fname'])>=31){
        $error['first name'] = 'First name too long. Cannot be more than 30 characters.';
    }
    
    //validate last name
    if (empty($_POST['lname'])){
        $error['last name'] = 'Last name empty.';
    }
    elseif (strlen($_POST['lname'])>=31){
        $error['last name'] = 'Last name too long. Cannot be more than 30 characters.';
    }
    
    //validate email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){    
    }
    else {
       $error['email'] = 'Invalid email address.';
    }
    
   // validate password
   if (strlen($password)>72){
       $error['password'] = 'Password is too long. Cannot be more than 72 characters.';
   }
   
   if (!empty($error)){
       foreach ($error as $er){
           echo "$er<br/>";
       }
       
       echo '<br/><a href="registersecure.php"> Back to registration. </a>';
       die;
   } 
  
    
    $sql = "INSERT INTO users (username, password, fname, lname, email)VALUES(:username, :password, :fname, :lname, :email)";
    $query = $db->getConnection()->prepare($sql);
    $result = $query->execute(array(':username'=>$username, ':password'=>$hash, ':fname'=>$fname,
        ':lname'=>$lname, ':email'=>$email));
    
    if ($result){
        echo "Thanks for registering with us!<br/>";
        echo '<a href="addbeer.php"> Add your first beer! </a>';
    }
    else {
        echo "Sorry, an error occurred while editing the database. Contact the guy who built this garbage.";
    };

};

?>
