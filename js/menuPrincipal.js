function accioPP(idAccio) {
    
    if (idAccio == "categories") {
        string = "resource_llistatCategories.php";
    } else if (idAccio == "productes") {
        string = "resource_llistatProductes.php";
    } else {
        string = "resource_llistatProductes.php";
    }

    fetch(string)
        .then(response => response.text())
        .then(data => {
            // document.getElementById("capçalera").innerHTML = "";
            document.getElementById("pantalla_principal").remove();
            document.body.innerHTML = document.body.innerHTML + data;
            // document.getElementById("pantalla_principal").innerHTML = data;
            // document.body.innerHTML = data;
        });
}

function categoriaPP(idCategoria) {
    fetch("resource_llistatProductesCategoria.php?categoria="+idCategoria)
        .then(response => response.text())
        .then(data => {
            document.getElementById("pantalla_principal").remove();
            document.body.innerHTML = document.body.innerHTML + data;
        });
}

function detallProductePP(idProducte) {
    fetch("resource_detallProducte.php?idProducte="+idProducte)
        .then(response => response.text())
        .then(data => {
            document.getElementById("pantalla_principal").remove();
            document.body.innerHTML = document.body.innerHTML + data;
        });
}