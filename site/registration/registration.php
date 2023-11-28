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
$nickname=$conn->real_escape_string($_POST['Nick']);
$uni = $conn->real_escape_string($_POST['Unige_ID']);
$email = $conn->real_escape_string($_POST['Email']);
$password = $conn->real_escape_string($_POST['password']);
 
$uni_regex = "/^\d{7}$/"; 

if (!preg_match($uni_regex, $uni)) {
    echo "<div style='width:40%;float:left'><h3>numero matricola non valido</h3><br><p>ricontrollare i dati inseriti</p><br><input type='button' value='Go back!' onclick='history.back()'></div>";
    echo "<div style='margin-left=40%'><img src='giphy.gif' alt='' width='780' height='auto'></div>";
    error_log("Codice fiscale o numero matricola non valido", 0, "error_log.txt",);
    return;
}

// controlla se la mail esiste o meno
$result = $conn->query("SELECT * FROM utenti WHERE email='$email'");
if ($result->num_rows > 0) {
    echo "<div style='width:40%;float:left'><h3>Email gia registrata nel nostro sito</h3><br><p>cliccare il riferimento qui accanto per accedere</p><br><a href='../login/login.php'>Login</a></div>";
    echo "<div style='margin-left=40%'><img src='welcome.gif' alt='' width='780' height='auto'></div>";
    return;
}

//controlla se il nickname esiste gia o no
$result = $conn->query("SELECT * FROM utenti WHERE nickname='$nickname'");
if ($result->num_rows > 0) {
    echo "<div style='width:40%;float:left'><h3>Nickname gia usato,cercatene un altro</h3><br><p>cliccare il riferimento qui accanto per accedere</p><br><a href='../login/login.php'>Login</a></div>";
    echo "<div style='margin-left=40%'><img src='spiderman.gif' alt='' width='780' height='auto'></div>";
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