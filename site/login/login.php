<?php
$servername = "localhost";
$username = "yuri";
$password = "romanus99";
$dbname = "unige";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_COOKIE["email"])){
    $email = $_COOKIE["email"];
    $result = $conn->query("SELECT * FROM utenti WHERE email = '$email'");
    if($result->num_rows > 0){
        session_start();
        $_SESSION['user'] = $result->fetch_assoc();
        if($email == "lollo02@gmail.com") header("Location: ../welcome/welcomeroot.html");
        else {
            header("Location: ../welcome/welcomebase.html");}
        exit;
    }
}

if (isset($_POST['Email']) && isset($_POST['password'])) {
    $email = $_POST['Email'];
    $password = $_POST['password'];
    $result= $conn->query("SELECT * FROM utenti WHERE email = '$email'");

    if(isset($_POST['remember'])) {
        $Cookie_email = "email";
        $Cookie_password = "password";
        setcookie($Cookie_email, $email, time() + (86400 * 30), "/"); 
        setcookie($Cookie_password, $password, time() + (86400 * 30), "/"); 
    }
    else{
        setcookie("username","");
        setcookie("password","");
    }

    if(isset($_POST['log_out']))
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        session_destroy();

        if(isset($_COOKIE["email"]) AND isset($_COOKIE["password"])){
            setcookie("email", '', time() - (86400 * 30),'/');
            setcookie("password", '', time() - (86400 * 30),'/');
        }

        header('Location:login.php');
        exit;
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            if ($email == "lollo02@gmail.com") {
                header("Location: ../welcome/welcomeroot.html");
            } else {
                header("Location: ../welcomewelcomebase.html");
            }
            exit();
        } else {
            echo "<script>alert('Password is incorrect.');window.location.href='login.php';</script>";
            exit();
        }
    }

    
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <fieldset class="bordo">
        <legend>Credenziali da inserire</legend>
        <img src="Dibris.png" alt="">
        <label for="email" class="email">Email</label><br >
        <input type="email" placeholder="enter mail" id="email" name="Email" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" required><br>
        <label for="password" class="pass">password</label><br>
        <input type="password" placeholder="enter password" id="password" maxlength="24" minlength="6" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" required><br>
        <label for="remember">Ricordami</label><br >
        <input type="checkbox" id="remember" name="remember">
        <div>
            <p>Hai dimenticato la password? <a href="../registration/info.html">Clicca per maggiori informazioni</a>.</p>
            <p>Account non ancora registrato? <a href="../registration/registration.html">Effettua la registrazione</a></p>
            <button type="submit" name="log_out">logout</button>
        </div>
        </fieldset>
        <button type="submit" name="submit" class="registerbtn">SUBMIT</button>
    </form>
    <?php echo ""?>
</body>
</html>

