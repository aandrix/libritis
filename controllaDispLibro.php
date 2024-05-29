<?php


session_start();
require("../conf/db_config.php");

$stmt = $conn->prepare("SELECT * FROM libri l WHERE l.Titolo = ? AND l.id NOT IN ( SELECT p.IdLibro FROM prenotazioni p WHERE p.Restituito = 'N' );");
$stmt->bind_param("s", $_GET['title']);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$conn->close();

if (!$row) {
    echo("<script> window.alert('libro non disponibile !'):</script>")
    header("location: catalogo.php");
} else {
    $_POST['title'] = $_GET['title'];
    header("location: programmaRitiro.php");
}

?>
