<div id="pantalla_principal">
    <br /><br />

    <div class="detallProducte">

        <div class="imatge">
            <?php if ($producte['imatge'] != null) { ?>

                <?php if ($producte['format'] == 'CD') { ?>
                    <img src="img/cd.png" alt="Imatge Disco" class="disco" />
                <?php } else if ($producte['format'] == 'Vinil') { ?>
                    <img src="img/disco.png" alt="Imatge Disco" class="disco" />
                <?php } ?>

                <img src="img/<?php echo $producte['imatge']; ?>" alt="Imatge del producte" class="portadadetall" />
            <?php } else { ?>
                <!-- <img src="img/noimage.png" alt="Sense imatge" /> -->
            <?php } ?>
        </div>


        <div class="textdetall">
            <h3 class="artista"><?php echo $producte['artista']; ?></h3>
            <p class="nom"> <?php echo $producte['nom']; ?></p>
            <p class="format"> Format: <?php echo $producte['format']; ?></p>
            <p class="descripcio"><?php echo $producte['descripcio']; ?></p>

            <div class=bttpreu>
                <p class="preu"><?php echo $producte['preu']; ?> €</p>
                <input class="quantitatProducte" type="text" id="quantitatProducte" value="1" class="quantitat" />
                <button id="afegirCistella" class="añadirCesta" onclick="afegirProducteCistella(<?php echo $producte['id']; ?>, <?php echo $producte['preu']; ?>)">Afegir a la cistella</button>
                <!-- Selector de nombre d'unitats -->
            </div>
        </div>
    </div>
    <br><br>
</div>

<script>
    // document.querySelector("#afegirCistella").addEventListener("click", afegirProducteCistella(<?php //echo $producte['id']; ?>, <?php //echo $producte['preu']; ?>));
    // let name;
    // document.getElementById("#afegirCistella").addEventListener("click", () => {
    //     name = document.getElementById("quantitatProducte").value;
    //     console.log(name);
    // });
</script>