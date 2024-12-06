<?php
// Verifica se l'utente ha inserito la password corretta
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) { 
    header("Location: login.php");
    exit;
}

// Gestisce il caricamento dell'immagine
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $targetDir = "images/";  // Cartella dove salvare le immagini
    $targetFile = $targetDir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verifica il tipo di file
    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo "Il file è stato caricato con successo!";
        } else {
            echo "Errore nel caricamento del file.";
        }
    } else {
        echo "Solo immagini JPG, JPEG, PNG, GIF sono consentite.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carica Immagini</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Carica una Nuova Immagine nella Galleria</h1>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="image">Scegli l'immagine:</label>
    <input type="file" name="image" id="image" required>
    <br><br>
    <input type="submit" value="Carica Immagine" name="submit">
</form>

</body>
</html>
