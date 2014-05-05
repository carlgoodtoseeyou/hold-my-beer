
<?php

class dbconn {
    protected $dbname;
    protected $dbuser;
    protected $dbpassword;
    protected $dbhost;
    protected $connection;
    
    public function __construct($dbhost, $dbname, $dbuser, $dbpass) 
    {
        $this->dbname = $dbname;
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->connect();
    }
   
    public function getConnection()
    {
        return $this->connection;
    }
    
    protected function connect()
    {
        $this->connection = new PDO("mysql:host={$this->dbhost};dbname={$this->dbname}", $this->dbuser, $this->dbpass);
    }
}
?>
<html>
    <h2>
        Hold My Beer!<br />
        <meta charset="UTF-8">
        <title>Hold My Beer!</title>
    </h2>
    <body>
 
    </body>
</html>

