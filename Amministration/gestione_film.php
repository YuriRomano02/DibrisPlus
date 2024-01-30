<?php
session_start();
include '../Common_elements/databaseConnection.php';
include "../Common_elements/controlla_permessi.php";
?>
<!doctype html>
<html lang="it">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Gestione Film</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Titolo</th>
                                    <th>Anno di Rilascio</th>
                                    <th>Regista</th>
                                    <th>Genere</th>
                                    <th>Durata</th>
                                    <th>Produzione</th>
                                    <th>Distribuzione</th>
                                    <th>Paese</th>
                                    <th>Incassi</th>
                                    <th>Costi di Produzione</th>
                                    <th>Descrizione</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM film";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $film) {
                                ?>
                                        <tr>
                                            <td><?= $film['Titolo']; ?></td>
                                            <td><?= $film['AnnoDiRilascio']; ?></td>
                                            <td><?= $film['Regista']; ?></td>
                                            <td><?= $film['Genere']; ?></td>
                                            <td><?= $film['Durata']; ?></td>
                                            <td><?= $film['Produzione']; ?></td>
                                            <td><?= $film['Distribuzione']; ?></td>
                                            <td><?= $film['Paese']; ?></td>
                                            <td><?= $film['Incassi']; ?></td>
                                            <td><?= $film['CostiDiProduzione']; ?></td>
                                            <td><?= $film['Descrizione']; ?></td>
                                            <td>
                                                <form action="delete_film.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_film" value="<?= $film['Titolo']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> No Record Found </h5>";
                                }
                                ?>

                            </tbody>
                        </table>
                        
                        <button type="submit" name="go_back" class="btn btn-danger btn-sm" onclick="location.href='amministration.php'"><-Indietro</button>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>