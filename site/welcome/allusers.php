<?php
// Connessione al database
$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per selezionare tutti gli utenti ordinati per cognome
$sql = "SELECT * FROM utenti ORDER BY cognome ASC";
$result = $conn->query($sql);

// Stampa l'elenco degli utenti in una tabella
if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 100%;'>";
    echo "<tr><th style='border: 1px solid black; padding: 10px;'>Nome</th><th style='border: 1px solid black; padding: 10px;'>Cognome</th><th style='border: 1px solid black; padding: 10px;'>Email</th><th style='border: 1px solid black; padding: 10px;'>Password cifrata</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td style='border: 1px solid black; padding: 10px;'>" . $row["nome"]. "</td><td style='border: 1px solid black; padding: 10px;'>" . $row["cognome"]. "</td><td style='border: 1px solid black; padding: 10px;'>" . $row["email"]."</td><td style='border: 1px solid black; padding: 10px;'>".$row["password"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nessun utente trovato";
}

$conn->close();
?>