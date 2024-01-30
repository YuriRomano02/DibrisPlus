<?php
session_start();
include '../Common_elements/databaseConnection.php';
include "../Common_elements/controlla_permessi.php";
?>
<!doctype html>
<html lang="it">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
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
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM utenti";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $utenti) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $utenti['nome']; ?>
                                            </td>
                                            <td>
                                                <?= $utenti['cognome']; ?>
                                            </td>
                                            <td>
                                                <?= $utenti['email']; ?>
                                            </td>
                                            <td>
                                                <form action="delete_user.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_user" value="<?= $utenti['email']; ?>"
                                                        class="btn btn-danger btn-sm">Delete</button>
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
                        <button type="submit" name="go_back" class="btn btn-danger btn-sm"
                            onclick="location.href='amministration.php'"><-Indietro< /button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>