<div id="pantalla_principal">
    <h3>Tots els productes</h3>
    <p>Explora tot el catàleg de Discos Metàl·lic</p>
    <div class="llistat">

        <?php foreach ($productes as $producte) { ?>
            <div class="producte">
                <span onclick="detallProductePP('<?php echo $producte['id']; ?>')">
                    <?php if ($producte['imatge'] != null) { ?>
                        <img src="img/<?php echo $producte['imatge']; ?>" alt="Imatge del producte" class="portadaproducte" />
                    <?php } else { ?>
                        <!-- <img src="img/noimage.png" alt="Sense imatge" /> -->
                    <?php } ?>
                    <h3><?php echo $producte['nom']; ?> (<?php echo $producte['format']; ?>)</h3>
                    <p><?php echo $producte['artista']; ?></p>
                    <p class="preu"><?php echo $producte['preu']; ?> €</p>

                </span>
            </div>
        <?php } ?>
    </div>
</div>