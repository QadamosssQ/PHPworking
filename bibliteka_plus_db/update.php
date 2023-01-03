<style>



    body{
        background-color: #553737;
        color: aliceblue;
    }
    a{
        color: #2e7dc2;
        text-decoration: none;
    }
</style>


<?php
require_once 'conn.php';

$query = "SELECT * FROM ksiazki WHERE id=".$_GET['id'];

$result = mysqli_query($conn, $query);

$wynik = mysqli_fetch_assoc($result);



echo "<h1>Edytuj książkę pt. ".$wynik['nazwa']."</h1>";



?>

<form method="post">
  <?php
    echo"   Tytul: <input type=\"text\" name=\"tytul_ed\" placeholder=" .$wynik['nazwa']."><br>";
    echo" Autor: <input type=\"text\" name=\"autor_ed\" placeholder=" .$wynik['autor']."><br>";
    echo" Liczba stron: <input type=\"number\" name=\"strony_ed\" placeholder=" .$wynik['strony']."><br>";
   echo"  <input type=\"submit\" value=\"edit\" name=\"submit_ed\" >";

    ?>
</form>




<p><a href='main.php'>Wróć do strony głównej</a></p>





<?php

require_once 'conn.php';


if(isset($_POST['submit_ed'])) {


    $tytul = $_POST['tytul_ed'];
    $autor = $_POST['autor_ed'];
    $strony = $_POST['strony_ed'];


    $update_title = "UPDATE ksiazki SET nazwa='$tytul' WHERE id=" . $_GET['id'];
    $update_autor = "UPDATE ksiazki SET autor='$autor' WHERE id=" . $_GET['id'];
    $update_strony = "UPDATE ksiazki SET strony='$strony' WHERE id=" . $_GET['id'];


    if (!empty($tytul)) {
        $result1 = mysqli_query($conn, $update_title);
    }

    if (!empty($autor)) {
        $result2 = mysqli_query($conn, $update_autor);

    }

    if (!empty($strony)) {
        $result3 = mysqli_query($conn, $update_strony);

    }


    if($result1 || $result2 || $result3){
        echo "Zaktualizowano";
        header("Location: main.php");
    } else {
        echo "Nie zaktualizowano";
    }
}
