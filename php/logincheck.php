<?php
session_start();
require("../conf/db_config.php");

$stmt = $conn->prepare("SELECT * FROM credenziali_utenti WHERE Email = ? AND Password = ?");
$stmt->bind_param("ss", $_POST['user'], $_POST['psw']);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$conn->close();

if (!$row) {
    $_SESSION['error'] = "Email o password non corretti";
    header("location: ../login.php");
    exit();
} else {
    if ($_POST['user'] == $row['Email'] && $_POST['psw'] == $row['Password']) {
        $_SESSION['login'] = 'ok';
        $_SESSION['email'] = $row['Email'];
        $_SESSION['password'] = $row['Password'];
        header("location: ../catalogo.php");
        exit();
    } else {
        $_SESSION['error'] = "Email o password non corretti";
        header("location: ../login.php");
        exit();
    }
}
?>
