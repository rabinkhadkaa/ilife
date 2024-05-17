<?php
if(isset($_GET['noteID'])){
    $NID = $_GET['noteID'];
    echo $NID;
} else{
    echo "Not passed";
}

?>