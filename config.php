<?php 

session_start();

$conn = mysqli_connect("localhost","root","","gym") or die("Nemoguća konekcija na bazu");
if(!$conn){
    die("Neuspješna konekcija!");
}

?>