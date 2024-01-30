const email = document.getElementById("email")
const emailEsistente = document.getElementById("emailEsistente")

email.addEventListener("change", function (event) {
    datiForm = new FormData()
    datiForm.append("email", event.target.value)
    fetch("./find_email.php", {
        method: "POST",
        body: datiForm
    })
        .then(response => response.text())
        .then(data => {
            if (data == "true") {
                emailEsistente.style.display = "block";
            } else{
                emailEsistente.style.display = "none";
            }
        })
})
