
<style media="screen" type="text/css">
.line {
    display: block;
    border: none;
    color: #333;
    background: transparent;
    border-bottom: 1px dotted black;
    padding: 5px 2px 0 2px;
}
 
.line:focus {
    outline: none;
    border-color: #51CBEE;
}
        </style>
<html>
    <h2>
        Hold My Beer!<br />
        <meta charset="UTF-8">
        <title>Hold My Beer!</title>
    </h2>
    <body>
    <form action="/PHPproject/forms/login.php"display: inline>
    <input type="submit" value="Login">
    </form>
    <form action="/PHPproject/forms/registersecure.php"display: inline>
    <input type="submit" value="Register">
    </form>
        <?php
        sessionstart();
        
        ?>
    </body>
</html>
