<?php
    $servername = "localhost";
    $username = "yuri";
    $password = "romanus99";
    $dbname = "unige";

    // crea la connessione
    $conn = new mysqli($servername, $username, $password, $dbname);

    // controllo la connessione
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $searchTerm = $_GET['searchbox'];

    // prepara la query
    $stmt = $conn->prepare("SELECT * FROM tabella_html WHERE titolo = ?");
    $stmt->bind_param("s", $searchTerm);

    // esecuzione della query
    $stmt->execute();

    // ottiene il risultato
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // output dei dati di ogni riga
        while($row = $result->fetch_assoc()) {
            echo $row["contenuto"];
        }
    } else {
        echo "0 results";
    }

    $conn->close();
?>