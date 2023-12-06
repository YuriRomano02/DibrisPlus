<?php
//mysqli::__construct() serve per aprire la connessione cn il db
$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// real_escape_string() serve per evitare l'SQL injection,ovvero l'attacco che consiste nell'inserire codice SQL all'interno di un form
$nome = $conn->real_escape_string($_POST['Nome']);
$cognome = $conn->real_escape_string($_POST['Cognome']);
$email = $conn->real_escape_string($_POST['Email']);
$password = $conn->real_escape_string($_POST['password']);
 

// controlla se la mail esiste o meno
$result = $conn->query("SELECT * FROM utenti WHERE email='$email'");
if ($result->num_rows > 0) {
    echo "<div style='width:40%;float:left'><h3>Email gia registrata nel nostro sito</h3><br><p>cliccare il riferimento qui accanto per accedere</p><br><a href='../login/login.php'>Login</a></div>";
    echo "<div style='margin-left=40%'><img src='../immagini e gif/gif/welcome.gif' alt='' width='780' height='auto'></div>";
    return;
}


// crea l'hash della password
$hash = password_hash($password, PASSWORD_DEFAULT);
// inserisce i dati nel db
$sql = "INSERT INTO utenti (nome, cognome,nickname ,uni, email, password) VALUES ('$nome', '$cognome', '$nickname', '$uni', '$email', '$hash')";
if ($conn->query($sql) === TRUE) {
    echo "<div style='width:40%;float:left'><h3>Registrazione andata a buon fine</h3><br><p>cliccare il riferimento qui accanto per accedere</p><br><a href='../login/login.php'>Login</a></div>";
    echo "<div style='margin-left=40%'><img src='yes.gif' alt='' width='780' height='auto'></div>";
    
} else {
    echo "<div style='width:40%;float:left'><h3>Errore durante la registrazione</h3><br><p>Zitto prova,prova e prova</p><br><input type='button' value='Go back!' onclick='history.back()'></div>";
    echo "<div style='margin-left=40%'><img src='no.gif' alt='' width='780' height='auto'></div>";
}

// chiude la connessione
$conn->close();
?>