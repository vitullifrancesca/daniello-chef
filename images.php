<?php
session_start();

// Verifica se l'utente è autenticato
if (!isset($_SESSION['is_authenticated']) || $_SESSION['is_authenticated'] !== true) {
    // Se non è autenticato, reindirizza alla pagina di login
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se il file è stato caricato correttamente
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Ottieni le informazioni sul file
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        
        // Controlla che sia un'immagine
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($file_type, $allowed_types)) {
            // Salva il file nella cartella 'uploads'
            $upload_dir = 'uploads/';
            $upload_file = $upload_dir . basename($file_name);
            
            // Controlla se il file esiste già
            if (move_uploaded_file($file_tmp, $upload_file)) {
                echo "Immagine caricata con successo!";
            } else {
                echo "Errore nel caricamento dell'immagine.";
            }
        } else {
            echo "Solo file immagine (JPEG, PNG, GIF) sono permessi.";
        }
    } else {
        echo "Nessun file selezionato o errore durante il caricamento.";
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

<h1>Carica una nuova immagine</h1>

<form action="images.php" method="POST" enctype="multipart/form-data">
    <label for="image">Scegli un'immagine:</label>
    <input type="file" name="image" id="image" accept="image/*" required>
    <button type="submit">Carica</button>
</form>

</body>
</html>
