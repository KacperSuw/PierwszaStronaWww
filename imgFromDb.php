<?php
$mysqli = new mysqli("localhost", "root", "", "praktyki");

// Sprawdzenie połączenia
if ($mysqli->connect_error) {
    die("Błąd połączenia: " . $mysqli->connect_error);
}

// Pobranie id z GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = $mysqli->prepare("SELECT img FROM employers WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($img);
    $stmt->fetch();
    $stmt->close();

    if ($img) {
        // Zakładamy, że wszystkie obrazki są w formacie PNG lub możesz dodać kolumnę 'img_type'
        header("Content-Type: image/png");
        echo $img;
        exit;
    }
}

http_response_code(404);
echo "Obraz nie znaleziony.";
?>