// Aggiungi questo codice in script.js
document.getElementById("frutta_verdura").addEventListener("click", function() {
    // Effettua una richiesta AJAX per ottenere i dati dei prodotti
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Una volta ottenuti i dati, apri la modale
            openModal(xhr.responseText);
        }
    };
    xhr.open("POST", "doppia_categoria.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("categoria=Frutta e Verdura");
});

// Funzione per aprire la modale e visualizzare i risultati
function openModal(response) {
    var modal = document.getElementById("myModal");
    var modalContent = document.querySelector(".modal-content");
    modalContent.innerHTML = response;
    modal.style.display = "block";
}

// Rimani al tuo codice per chiudere la modale
