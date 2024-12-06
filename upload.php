<?php
session_start();

// Verifica che l'utente sia autenticato
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: login.php'); // Se non autenticato, reindirizza al login
    exit;
}

// Verifica se è stato inviato un file
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Controlla se il file è un'immagine
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Il file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " è stato caricato.";
        } else {
            echo "Errore nel caricamento del file.";
        }
    } else {
        echo "Il file non è un'immagine.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carica Immagine</title>
</head>
<body>
    <h1>Carica una foto nella Galleria</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="image">Scegli un'immagine da caricare:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Carica Immagine</button>
    </form>
</body>
</html>
