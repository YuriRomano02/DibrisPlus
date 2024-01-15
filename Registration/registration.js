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
