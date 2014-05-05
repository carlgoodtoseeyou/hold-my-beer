<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL); ini_set('display_errors', 1);

require "/home/carlton/public_html/PHPproject/allincludes.php";


if ($_SESSION['logged_in']!="yes"){
    header ("Location: unauth.php");
}



//if (count($_POST)>0){
//need to add in validation check here
//
//
//
//
//$validationErrors= 0;
//checking connection is present
$dbconn = new dbconn('localhost','phpproject','carl','pdt1848?');
    

//if(count($validationErrors == 0 )){
        $form=$_POST;
        $beer_name = $form['beer_name'];
        $beer_type = $form['beer_type'];
        $beer_abv = $form['beer_abv'];
        $beer_rating = $form['beer_rating'];
        
   // }
   
   
    $new_beer = new Beer($beer_name);
    $new_beer->setBeerType($beer_type);
    $new_beer->setBeerABV($beer_abv);
    $new_beer->setBeerRating($beer_rating);
    $beereditor = new BeerEditor($dbconn);
    $beereditor->addBeer($new_beer);   
    echo "<br/>";
    print_r ($new_beer);

    
    
    echo "<br/>Beer added.";
 echo '<br/><a href="addbeer.php"> Back to add menu </a>';  
//}
