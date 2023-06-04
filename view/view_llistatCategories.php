<div id="pantalla_principal">
    <h3>Gèneres</h3>
    <p>Filtra productes a partir del seu gènere</p>
    <div class="llistat">
        <?php foreach ($categories as $categoria) { ?>
            <div class="categoria">
                <span onclick="categoriaPP('<?php echo $categoria['idcat']; ?>')">
                    <p><?php echo $categoria['nom']; ?></p>
                </span>
            </div>
        <?php } ?>
    </div>
</div>