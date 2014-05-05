<?php
/**
 * Description of user
 *
 * @author root
 */
class user {
    protected $fname;       //varchar(30)
    protected $lname;       //varchar(30)
    protected $username;    //varchar(40)
    protected $password;    //varchar(60)
    protected $email;       //varchar(255)
    protected $isadmin;     //enum('y','n') if y, user has admin privileges
    
    public function __construct($username = null){
        if ($username !== null){
            $this->setName($username);
        }    
        //defaults
        $this->setAdmin('n');
       // $this->setEmail($email);
       // $this->setFname($fname);
       // $this->setLname($lname);
       // $this->setPassword($password);

           
        
    }
    
        public function setUsername(){
            $this->username = $username;
        }
        public function getUsername(){
                return $this->username;
        }
        
        public function setFname(){
            $this->fname = $fname;
        }
        public function getFname(){
            return $this->fname;
        }
        
        public function setLname(){
            $this->lname = $lname;
        }
        public function getLname(){
            return $this->lname;
        }
        
        public function setPassword(){
            $this->password = $password;
        }
        public function getPassword(){
            return $this->password;
        }
        
        public function setEmail(){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }
        
        public function setAdmin(){
            $this->isadmin = $isadmin;
        }
        public function getAdmin(){
            return $this->isadmin;
        }
}
