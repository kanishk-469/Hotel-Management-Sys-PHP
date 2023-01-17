<?php
$connection = mysqli_connect("localhost","hotel","","hotel");
if($connection->connection_error){
    echo "Connection-Failed:" .$connection->connection_error;
}?>