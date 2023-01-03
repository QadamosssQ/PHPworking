<h1>Biblioteka</h1>


<h2>Dodaj książkę:</h2>

<form method="post">
    Tytul: <input type="text" name="tytul"><br>
    Autor: <input type="text" name="autor"><br>
    Liczba stron: <input type="number" name="strony"><br>
    <input type="submit" value="Dodaj" name="submit">
</form>

<h2>Spis książek:</h2>




<style>

    table, tr, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

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

$query = "SELECT * FROM ksiazki";

$result = mysqli_query($conn, $query);



echo "<table>";

echo "<tr>";
echo "<td>Tytul</td>";
echo "<td>Autor</td>";
echo "<td>Liczba stron</td>";
echo "<td>id</td>";
echo "<td>edit</td>";
echo "<td>usuń</td>";
echo "</tr>";

while($wynik=mysqli_fetch_assoc($result))
{

    echo "<tr>";
        echo "<td>".$wynik['nazwa']."</td>";
        echo "<td>".$wynik['autor']."</td>";
        echo "<td>".$wynik['strony']."</td>";
        echo "<td>".$wynik['id']."</td>";
        echo "<td><a href='update.php?id=".$wynik['id']."'>Edytuj</a></td>";
        echo "<td><a href='delete.php?id=".$wynik['id']."'>Usuń</a></td>";

    echo "</tr>";
}

echo "</table>";




if(isset($_POST['submit'])) {

    $query = "Insert into ksiazki (nazwa, autor, strony) values ('" . $_POST['tytul'] . "', '" . $_POST['autor'] . "', '" . $_POST['strony'] . "')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Dodano";
        header("Location: main.php");
    } else {
        echo "Nie dodano";
    }
}



