function afegirProducteCistella(idProducte, preu) {
    quantitat = document.getElementById("quantitatProducte").value;
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // document.getElementById("afegitAmbExit").style.display = "block";
            alert("Producte afegit a la cistella!");
        }
    };
    xhttp.open("GET", "resource_cistella.php?cistella=afegeix&afegeixID=" + idProducte + "&quantitat=" + quantitat + "&preu=" + preu, true);
    xhttp.send();
}