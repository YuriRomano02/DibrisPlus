const preferito = document.getElementById("preferiti")
const guardaDopo = document.getElementById("guardaDopo")
const visto = document.getElementById("visto")
const film = document.getElementById("titolo")



datiForm = new FormData()
preferito.addEventListener("click", function () {
    cambiaIconaPreferiti();

    datiForm.append("preferiti", "preferiti")

    fetch("./gestore_film.php", {
        method: "POST",
        body: datiForm
    }).then(response=>response.text())
    .then(function(data){
        console.log(data)
        if(data=="false"){
            window.alert("Errore nell'inserimento dei film tra i preferiti");
        }else if(data=="aggiunto"){
            window.alert("Film inserito tra i preferiti")
        }else{
            window.alert("Film tolto tra i preferiti")
        }
    })

    datiForm.delete("preferiti")

});

guardaDopo.addEventListener("click", function () {
    cambiaIconaGuardaDopo();

    datiForm.append("guardaDopo", "guardaDopo")
    fetch("./gestore_film.php", {
        method: "POST",
        body: datiForm
    })

    datiForm.delete("guardaDopo")
});

visto.addEventListener("click", function () {
    cambiaIconaVisti();

    datiForm.append("visto", "visto")
    fetch("./gestore_film.php", {
        method: "POST",
        body: datiForm
    })

    datiForm.delete("visto")
});

function cambiaIconaPreferiti() {
    if (preferito.classList.contains("fa-regular")) {
        preferito.classList.remove("fa-regular");
        preferito.classList.add("fa-solid");
    } else {
        preferito.classList.remove("fa-solid");
        preferito.classList.add("fa-regular");
    }
}

function cambiaIconaGuardaDopo() {
    if (guardaDopo.classList.contains("fa-regular")) {
        guardaDopo.classList.remove("fa-regular");
        guardaDopo.classList.add("fa-solid");
    } else {
        guardaDopo.classList.remove("fa-solid");
        guardaDopo.classList.add("fa-regular");
    }
}

function cambiaIconaVisti() {
    if (visto.classList.contains("fa-check")) {
        visto.classList.remove("fa-check")
        visto.classList.add("fa-xmark");
    } else {
        visto.classList.remove("fa-xmark");
        visto.classList.add("fa-check");
    }
}