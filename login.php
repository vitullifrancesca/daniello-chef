<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nome utente e password predefiniti
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'mamma' && $password == 'mamma') {
        $_SESSION['is_authenticated'] = true;  // Imposta la sessione come autenticata
        header('Location: images.php');  // Reindirizza alla pagina di caricamento
        exit;
    } else {
        $error = "Nome utente o password errati.";
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

<h1>Accedi per caricare un'immagine</h1>

<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

<form action="login.php" method="POST">
    <label for="username">Nome utente:</label>
    <input type="text" name="username" id="username" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>

    <button type="submit">Accedi</button>
</form>

</body>
</html>
