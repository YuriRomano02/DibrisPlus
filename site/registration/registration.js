const form = document.getElementById("form")
const firstname = document.getElementById("firstname")
const lastname = document.getElementById("lastname")
const email = document.getElementById("email")
const pass = document.getElementById("pass")
const confirm = document.getElementById("confirm")

form.addEventListener("submit", controlloCredenziali(event))

function controlloPassword(){
    return pass.value = confirm.value
}

function controlloCredenziali(event){
    event.preventDefault()
    if(!controlloPassword()){
        alert("La password non coincide con la conferma della password")
    }
}