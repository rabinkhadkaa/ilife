<?php
$salary[]=1;
$salary[]=2;
$salary[]=3;


function generateRandomString($length = 20) {
    // Define the characters that can be used in the string
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength-1)];
    }
    
    return $randomString;
}



foreach ($salary as $value){
    $comparision = $value;
    echo $comparision. "<br>";
    
};

?>
