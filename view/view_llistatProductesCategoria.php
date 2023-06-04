<div id="pantalla_principal">
    <h3>Productes de la categoria <?php echo $nomCategoria; ?></h3>
    <div class="llistat">
        <?php foreach ($productes as $producte) { ?>
            <div class="producte">
                <span onclick="detallProductePP('<?php echo $producte['id']; ?>')">
                    <?php if ($producte['imatge'] != null) { ?>
                        <img src="img/<?php echo $producte['id']; ?>.png" alt="Imatge del producte" class="portadaproducte" />
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