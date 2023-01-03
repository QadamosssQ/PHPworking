<?php

$conn = mysqli_connect("localhost", "root", "", "biblioteka");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
