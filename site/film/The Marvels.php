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

if(isset($_POST['name']) && isset($_POST['commento'])){
    $nome = $conn->real_escape_string($_POST['name']);
    $commento = $conn->real_escape_string($_POST['commento']);

    $sql = "INSERT INTO comment (name, commento) VALUES ('$nome', '$commento')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location = 'The Marvels.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/549ec4da67.js" crossorigin="anonymous"></script>
    <title>The Marvels</title>
    <style>
        div::-webkit-scrollbar {
            display: none;
        }

        .page{
            display: flex;
        }

        p{
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        li{
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        ::placeholder{
            color: black;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>
<body style="background-color: rgba(26,39,85,1);" onload="Comment.reset()">
    <div>
    <header>
        <h1 class="titolo" style="display: inline-block;color: white;">The Marvels</h1>
        <i class="fa-regular fa-heart" style="color: #ffffff;font-size: 30px;display: inline-block;margin-left: 1%;"></i>
    </header>
    </div>
    <div class="page">
        <article class="testo" style="width: 70%; float: left; font-size: 120%;">
            <h1>Trama</h1>
            <p>
                La distruzione dell'Intelligenza Suprema da parte di Carol Danvers ha portato alla guerra civile tra le specie Kree sul loro mondo natale, Hala. Il conflitto ha lasciato il pianeta arido, poiché ha perso ossigeno, acqua e luce solare. Dar-Benn, la nuova leader dei Kree, recupera uno dei due Bracciali Quantici, di cui Kamala Khan possiede l'altro. Dar-Benn sfrutta il potere del bracciale, lo combina con il suo bastone, chiamato "Arma Universale", e lo usa per distruggere un punto di salto nello spazio. L'anomalia che ne deriva viene rilevata dalla stazione spaziale S.A.B.E.R.

                Nel frattempo, Nick Fury, che ora risiede nella suddetta stazione spaziale insieme al Flerken Goose,[N 1] ospita le trattative di pace tra i Kree e gli Skrull. Fury chiama Carol Danvers e Monica Rambeau per indagare su un'anomalia nel punto di salto vicino alla stazione. Quando Rambeau la tocca, lei, Danvers e Kamala si scambiano di posto tramite teletrasporto.[N 2] Lo scambio fa sì che le tre combattano l'una contro i nemici Kree dell'altra, lasciando la casa dei Khan distrutta. Dopo che le tre donne sono tornate alle loro sedi originarie, Fury e Rambeau fanno visita a Kamala sulla Terra. Mentre Kamala dimostra con entusiasmo i suoi poteri, si scambia di posto con Danvers. Quando Danvers vola via, si scambia a sua volta di posto con Kamala lasciando quest'ultima a precipitare nel vuoto. Salvata Kamala, il gruppo ipotizza che i poteri basati sulla luce di Danvers, Rambeau e Kamala siano collegati attraverso l'entanglement quantistico e che si scambino di posto quando ognuna delle tre usa i propri poteri.
                
                Mentre la famiglia Khan decide di seguire Nick Fury, le tre si ritrovano in una colonia di rifugiati Skrull sul pianeta Tarnax, dove le trattative per il reinsediamento si sono sciolte. Dar-Benn apre un altro punto di salto che devia l'atmosfera di Tarnax verso Hala nel tentativo di ripristinare l'ossigeno. Dopo una precipitosa evacuazione della colonia con l'aiuto di Valchiria, Danvers, Rambeau e Kamala formano una squadra che Kamala chiama "le Marvels". Danvers informa gli altri della leggenda secondo cui i "Bracciali Quantici" sarebbero stati utilizzati per creare la rete di trasporto dei punti di salto; le tre sono rimaste "intrecciate" a causa del contatto reciproco con la sua energia quando Dar-Benn l'ha interrotta. La ripetuta interruzione dei punti di salto da parte di Dar-Benn sta causando un'ulteriore instabilità della rete che può mettere in pericolo l'universo.
                
                Dar-Benn arriva sul pianeta Aladna, dove apre un punto di salto per attirare l'acqua dell'oceano su Hala. Danvers capisce che il suo piano finale è quello di utilizzare il sole della Terra per ripristinare quello di Hala, capendo che attacca i popoli e i mondi a cui è legata. Le Marvels combattono e sconfiggono Dar-Benn, ma lei ruba il bracciale di Kamala e li usa entrambi per aprire un altro buco nello spazio. Lo sforzo compiuto uccide Dar-Benn e lascia un varco nel multiverso. Dopo che Kamala recupera i bracciali e annulla gli scambi, lei e Danvers usano i loro poteri combinati per dare energia a Rambeau, permettendole di chiudere il varco dall'altro lato, ma lasciandola bloccata nel processo. Kamala si ricongiunge con la sua famiglia mentre Danvers vola verso il sole di Hala e usa il suo potere per ripristinarlo. La breve collaborazione con Danvers e Rambeau ispira Kamala a cercare altri eroi e a formare un nuovo gruppo, a partire da Kate Bishop.
                
                Nella scena a metà dei titoli di coda, Rambeau si risveglia in un universo parallelo dove incontra una versione alternativa di sua madre Maria e il mutante Hank McCoy.    
            </p>
        </article>
        <aside style="width: 30%; float: right; height: auto;margin-top: 80px;">
            <img src="../site/locandine/The Marvels.jpg" style="width: 100%; height: auto;">
            <fieldset>
                <p>Anno di Produzione: 2023</p>
                <p>Direttore: Nia DaCosta</p>
                <p>Genere: Action, Adventure</p>
                <p>Durata: 120min</p>
                <p>Personaggi:
                    <ul>
                        <li>Carol Danvers / Captain Marvel</li>
                        <li>Monica Rambeau</li>
                        <li>Kamala Khan / Ms. Marvel</li>
                        <li>Dar-Benn</li>
                        <li>Imperatore Dro'ge</li>
                        <li>Principe Yan</li>
                        <li>Muneeba Khan</li>
                        <li>Yusuf Khan</li>
                        <li>Aamir Khan</li>
                        <li>Nick Fury</li>
                    </ul>
                </p>
                <p>Produzione: Production Company</p>
                <p>Distribuzione: Distribution Company</p>
                <p>Country: USA</p>
                <p>Incassi: $110 millioni</p>
                <p>Production Cost: $270 million</p>
                <p>Trailer: <a href="Thttps://youtu.be/nrMX5IcQZpE?si=sEP81Zu5Y5fJ6rOY">The Marvels Trailer</a></p>
                <form id="ratingForm">
                    <input type="radio" name="rating" value="1"> 1
                    <input type="radio" name="rating" value="2"> 2
                    <input type="radio" name="rating" value="3"> 3
                    <input type="radio" name="rating" value="4"> 4
                    <input type="radio" name="rating" value="5"> 5
                </form>
                
            </fieldset>
        </aside>
    </div>
    <section class="Actors" style="width: 100%;height: auto;">
        <h2>Personaggi</h2>
        <div class="scroll" style="overflow: auto;white-space: nowrap;padding: 10px;">

            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://th.bing.com/th/id/OIP.ZRMMnGn4dObLPue8RczdZgHaJZ?rs=1&pid=ImgDetMain" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;background-color: black;font-size: 110%;margin-left: 20%;">Brie Larson</p>
            </div>

            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://th.bing.com/th/id/R.8feaced2e5d6d3195ffd1acfb7b4b728?rik=GnB6wFYr5vcVUQ&pid=ImgRaw&r=0" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;background-color: black;font-size: 110%;margin-left: 20%;">Teyonah Parris</p>
            </div>

            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://iv1.lisimg.com/image/26463036/740full-iman-vellani.jpg" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;margin-left: 40%;background-color: black;font-size: 110%;margin-left: 20%;">Iman Vellani</p>
            </div>

            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://assets.mycast.io/actor_images/actor-zawe-ashton-829246_large.jpg?1690996613" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;background-color: black;font-size: 110%;margin-left: 20%;">Zawe Ashton</p>
            </div>

            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://th.bing.com/th/id/OIP.fLAxqE2PXxhRWXKgJHh37wHaLH?rs=1&pid=ImgDetMain" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;background-color: black;font-size: 110%;margin-left: 20%;">Samuel L. Jackson</p>
            </div>
            
            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://th.bing.com/th/id/OIP.RacpqaPQEGm55on9p7xjOQHaLH?rs=1&pid=ImgDetMain" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;background-color: black;font-size: 110%;margin-left: 20%;">Lashana Lynch </p>
            </div>

            <div class="primo attore" style="position: relative;display: inline-block;">
            <img src="https://th.bing.com/th/id/OIP.f70n4t-8o-Aipb4wadIJ2wHaKL?rs=1&pid=ImgDetMain" alt="" style='width: auto;height: 300px;' >
            <p class="text" style="position: absolute;bottom: 0%;color: white;background-color: black;font-size: 110%;margin-left: 20%;">Tessa Thompson</p>
            </div>
           <!-- <img src="" alt="" style="width: auto;height: 300px;">-->
        </div>
    </section>
    <h2>Commenti</h2>
    <div class="wrapper">
		<form action="" method="post" class="form">
			<input type="text" class="name" name="name" placeholder="Name">
			<br>
			<textarea name="commento" cols="30" rows="10" class="commento" placeholder="Message" ></textarea>
			<br>
			<button type="submit" class="btn" name="post_comment">Post Comment</button>
		</form>
	</div>

</body>
</html>
