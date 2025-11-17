<?php
print_r($_POST);
$od  = "From: kontaktowy@formularz.com \r\n";
$od .= 'MIME-Version: 1.0'."\r\n";
$od .= 'Content-type: text/html; charset=iso-8859-2'."\r\n";
$adres = $_POST['email'];
$tytul = "Formularz kontaktowy";
$wiadomosc = $_POST['texarea'];
mail($adres, $tytul, $wiadomosc, $od);
?>