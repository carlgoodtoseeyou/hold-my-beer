<?php
//a couple methods of trying to get this connecting to the db...neither working.


class BeerEditor
{
    private $db;
    
    function __construct(dbconn $db){
       $this->db = $db;
        
    }
    
    function addBeer(Beer $beerObj){
        //making connection to db here
        $conn = $this->db->getConnection();
        
        $stmt = $conn->prepare("INSERT INTO beers (beer_name, beer_type, beer_abv, beer_rating) VALUES (:beer_name, :beer_type, :beer_abv, :beer_rating)");
        //global $db;
        //$dbconn = $db->getConnection();
        //$stmt = $dbconn->prepare("INSERT INTO beers (beer_name, beer_type, beer_abv, beer_rating) VALUES (:beer_name, :beer_type, :beer_abv, :beer_rating)");
        
        // // was getting this warning "//Strict Standards: Only variables should be passed by reference in /path/to/file.php on line 123"
        // so i set them to vars
        $getbeer = $beerObj->getBeerName();
        $gettype = $beerObj->getBeerType();
        $getabv = $beerObj->getBeerABV();
        $getrating = $beerObj->getBeerRating();
        
        $stmt->bindParam(':beer_name', $getbeer);
        $stmt->bindParam(':beer_type', $gettype);
        $stmt->bindParam(':beer_abv', $getabv);
        $stmt->bindParam(':beer_rating', $getrating);
        
        $result = $stmt->execute();
        print_r($result);
        if($result === false){
            var_dump($stmt->errorCode());
        }
        
        return $result;
    }
    
    function listBeers(){
        
        $conn = $this->dbconn->getConnection();
        $result = $conn->query('SELECT * FROM beers');
        
        $result->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'beers');
        $beers = $result->fetchAll();
        
        return $beers;
    }
    
    
}
?>