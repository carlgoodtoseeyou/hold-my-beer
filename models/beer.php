<?php
/**
 * Description of beer
 *
 * @author root
 */
class beer {
    
    public $beer_name;   //varchar(45)
    public $beer_type;   //varchar(45)
    public $beer_abv;    //decimal(4,2) alcohol percentage ex. 06.50
    public $beer_rating; //char(10) 1 awful beer, 10 life-changing beer
   
    
    public function __construct($beer_name = null){
        if ($beer_name !== null){
            $this->setBeerName($beer_name);
        }    
        //defaults
        $this->setBeerType($_POST['beer_type']);
        $this->setBeerABV($_POST['beer_abv']);
        $this->setBeerRating($_POST['beer_rating']);
           
        
    }
    

        public function setBeerName($beer_name){ $this->beer_name = $beer_name; }
        public function getBeerName(){
                return $this->beer_name;
        }
        
        public function setBeerType($beer_type){ $this->beer_name = $beer_type; }
       
        public function getBeerType(){
            return $this->beer_type;
        }
        
        public function setBeerABV($beer_abv){ $this->beer_abv = $beer_abv; }
        public function getBeerABV(){
            return $this->beer_abv;
        }
        
        public function setBeerRating($beer_rating){ $this->beer_rating = $beer_rating;}
        public function getBeerRating(){
            return $this->beer_rating;
        }
}
