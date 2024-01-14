const form = document.getElementById("form")
const firstname = document.getElementById("firstname")
const lastname = document.getElementById("lastname")
const email = document.getElementById("email")
const pass = document.getElementById("pass")
const confirmPass = document.getElementById("confirm")
const emailEsistente = document.getElementById("emailEsistente")

function controlloPassword() {
    return pass.value == confirmPass.value
}

function campiVuoti() {
    return (!firstname.value || !lastname.value || !email.value || !pass.value || !confirmPass.value)
}

email.addEventListener("change", function (event) {
    datiForm = new FormData()
    datiForm.append("email", event.target.value)
    fetch("./find_email.php", {
        method: "POST",
        body: datiForm
    })
        .then(response => response.json())
        .then(data => {
            if (data) {
                emailEsistente.innerText = "email già in uso"
                emailEsistente.style.color = "red"
            } {
                emailEsistente.innerText = "email"
                emailEsistente.style.color = "cyan"
            }
        })
})

form.addEventListener("submit", function (event) {
    event.preventDefault()
    datiForm = new FormData()

    if (campiVuoti()) {
        alert("Inserisci tutti i campi obbligatori")
        //rende tutti i campi vuoti di colore arancione
        for (var i = 0; i < 5; i++) {
            if (!form.elements[i].value) {
                form.elements[i].style.background = "#ffd37a"
            }
            else {
                form.elements[i].style.background = "white"
            }
        }
    }
    else if (!controlloPassword()) {
        alert("La password non coincide con la conferma della password " + form.elements[0].value)
        confirmPass.value = ""
    }
    else {
        console.log(event.target);
        datiForm.append("firstname", event.target.firstname.value)
        datiForm.append("lastname", event.target.lastname.value)
        datiForm.append("email", event.target.email.value)
        datiForm.append("pass", event.target.pass.value)
        datiForm.append("confirm", event.target.confirm.value)
        fetch("./registration.php", {
            method: "POST",
            body: datiForm
        })
            .then(response => {
                console.log(response)
                window.location.href = "./registration_success.php"
            })
    }
})