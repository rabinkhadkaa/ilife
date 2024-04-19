create docker image- docker build . -t ilifeimage
create and run docker container- docker run --name=php -p=3000:3000 ilifeimage



<?php
    $noteid = $_COOKIE['note_id']; 
    $sql = "SELECT Title FROM notes WHERE username= '$myusername' AND NoteID = $noteid";
    $result = mysqli_query($conn, $sql);
    echo $result;
?>