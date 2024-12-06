<?php
session_start();

// Verifica se la password è corretta
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] === 'tuaMammaPassword') {  // Cambia con la tua password
        $_SESSION['authenticated'] = true;
        header("Location: upload.php");
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
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Accesso per il Caricamento delle Immagini</h1>

<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

<form action="login.php" method="post">
    <label for="password">Inserisci la password:</label>
    <input type="password" name="password" id="password" required>
    <br><br>
    <input type="submit" value="Accedi">
</form>

</body>
</html>
