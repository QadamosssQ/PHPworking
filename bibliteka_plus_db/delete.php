<?php

require_once 'conn.php';

$query= "DELETE FROM ksiazki WHERE id=".$_GET['id'];

$result = mysqli_query($conn, $query);

if($result){
    echo "Usunięto";
    header("Location: main.php");
} else {
    echo "Nie usunięto";
}