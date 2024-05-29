<?php
session_start();

// Controllo se l'utente è loggato
if (!isset($_SESSION['login']) || $_SESSION['login'] != 'ok') {
    header('Location: login.php');
    exit();
}
require("./conf/db_config.php");

// Query per recuperare tutte le stazioni
$sql = "SELECT IdStazione, nomeStazione FROM Stazioni";
$result = $conn->query($sql);

// Query per recuperare tutte le informazioni necessarie per la tabella
$stmt = $conn->prepare("
    SELECT utenti.*, bici.*, st.*
    FROM utenti
    JOIN noleggia ON utenti.idUtente = noleggia.idUtente
    JOIN stazioni st ON noleggia.idStazioneInizio = st.IdStazione
    JOIN (
        SELECT b.*
        FROM biciclette b
        LEFT JOIN slot s ON b.idBici = s.idBici
        WHERE s.idBici IS NULL
    ) AS bici ON noleggia.IdBicicletta = bici.idBici
");

$stmt->execute();



//salva dati
$result = $stmt->get_result();
$rows = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto Amministratore</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fbceb5;
        }
        .welcome-section {
            margin-top: 100px;
        }
        .welcome-card {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
<a href="home.php" class="btn btn-primary">home</a>
<a href="login.php" class="btn btn-primary">login</a>
    <div class="container welcome-section">
        <div class="row justify-content-center">
            <div class="card welcome-card">
                <div class="card-header text-center text-black" style="background-color: #fbceb5;">
                    <h2>Area amministratore</h2>
                </div>
                <div class="card-body text-center">
                    <h4 class="card-title">Ciao, <?php echo htmlspecialchars($_SESSION["nome"]); ?></h4>
                    <p class="card-text">Benvenuto nel pannello di amministrazione. Da qui puoi visualizzare quali biciclette sono state affittate, da quale stazione e da quale utente.</p>
                    <a href="paginaAdmin.php" class="btn btn-primary">Refresh</a>
                    <br><br>
                    
                    
                    <div class="table-responsive">
                        <?php 
                        echo "<table class=\"table\">
                        <thead>
                            <tr>
                                <th>idUtente</th>
                                <th>nomeUtente</th>
                                <th>cognomeUtente</th>
                                <th>indirizzo</th>
                                <th>numeroTelefono</th>
                                <th>numeroCarta</th>
                                <th>codiceCarta</th>
                                <th>scadenza</th>
                                <th>idBici</th>
                                <th>tagRFID</th>
                                <th>idStazione</th>
                                <th>nomeStazione</th>
                                <th>via</th>
                                <th>numeroCivico</th>
                            </tr>
                        </thead>
                        <tbody>";

                        foreach($rows as $row) {
                            echo "<tr>
                                <td>" . htmlspecialchars($row['idUtente']) . "</td>
                                <td>" . htmlspecialchars($row['nomeUtente']) . "</td>
                                <td>" . htmlspecialchars($row['cognomeUtente']) . "</td>
                                <td>" . htmlspecialchars($row['indirizzo']) . "</td>
                                <td>" . htmlspecialchars($row['numeroTelefono']) . "</td>
                                <td>" . htmlspecialchars($row['numeroCarta']) . "</td>
                                <td>" . htmlspecialchars($row['codiceCarta']) . "</td>
                                <td>" . htmlspecialchars($row['scadenza']) . "</td>
                                <td>" . htmlspecialchars($row['idBici']) . "</td>
                                <td>" . htmlspecialchars($row['tagRFID']) . "</td>
                                <td>" . htmlspecialchars($row['IdStazione']) . "</td>
                                <td>" . htmlspecialchars($row['nomeStazione']) . "</td>
                                <td>" . htmlspecialchars($row['via']) . "</td>
                                <td>" . htmlspecialchars($row['numeroCivico']) . "</td>
                            </tr>";
                        }

                        echo "</tbody></table>";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.getElementById('selectStazione').addEventListener("change", function(e){
            console.log("Selezione stazione cambiata");
        });
    </script>
</body>
</html>
