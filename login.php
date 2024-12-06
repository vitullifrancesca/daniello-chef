<?php
session_start();

// Definisci la password corretta
$correct_password = "mamma"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se la password inserita è corretta
    if ($_POST['password'] == $correct_password) {
        // Se la password è corretta, salva la sessione e reindirizza alla pagina di caricamento
        $_SESSION['authenticated'] = true;
        header('Location: upload.php'); // Reindirizza alla pagina di upload
        exit;
    } else {
        $error = "Password errata!";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login per caricare le foto</h1>
    <form method="POST" action="login.php">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Accedi</button>
    </form>

    <?php
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
</body>
</html>
