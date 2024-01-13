const form = document.getElementById("form")
const firstname = document.getElementById("firstname")
const lastname = document.getElementById("lastname")
const email = document.getElementById("email")
const pass = document.getElementById("pass")
const confirmPass = document.getElementById("confirm")

function controlloPassword() {
    return pass.value == confirm.value
}

function campiVuoti() {
    return (!firstname.value || !lastname.value || !email.value || !pass.value || !confirmPass.value)
}

function controlloEmail(){

}

email.addEventListener("change", function(){
})

form.addEventListener("submit", function (event) {
    event.preventDefault()
    if (campiVuoti()) {
        alert("Inserisci tutti i campi obbligatori")
        //rende tutti i campi vuoti di colore arancione
        for (var i = 0; i < 5; i++) {
            if (!form.elements[i].value) {
                form.elements[i].style.background = "#ffd37a"
            }
            else{
                form.elements[i].style.background = "white"
            }
        }
    }
    else if (!controlloPassword()) {
        alert("La password non coincide con la conferma della password " + form.elements[0].value)
        confirmPass.value = ""
    }
})