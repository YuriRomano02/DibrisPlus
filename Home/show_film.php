<?php

function filmFromDatabase($genere, $conn)
{
    $query = "SELECT Titolo, Locandina FROM film WHERE genere LIKE '%$genere%'";
    $result = $conn->query($query);
    if ($result->num_rows < 1) {
        echo "<p>Non ci sono ancora film di questo genere</p>";
    } else {
        while ($row = $result->fetch_assoc()) {
            echo "<a href='../Film/film.php?film=" . $row['Titolo'] . "'><img src='data:image/jpeg;base64," . base64_encode($row['Locandina']) . "'></a>";
        }
    }
}

?>