<h3>Dades de l'usuari</h3>
<div class="infoUsuari">
    <form action="index.php?accio=usuari&accioUsuari=update" class="formulariUsuari" method="post">
        <i>Dades del compte:</i>
        <br><br><br>
        <div class="inputContainer">
            <input type="email" name="usCorreu" class="input" placeholder="<?php echo $dadesUsuari['correu']; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="correu">
            <label class="label">CORREU ELECTRÒNIC</label>
        </div>
        <br>
        <div class="inputContainer">
            <div class="campo">
                <input type="password" name="usClau" class="input" placeholder="Introdueix la nova clau de pas" pattern="[A-Za-z0-9\s]+" id="clau" minlength="8">
                <label for="password" class="label">NOVA CLAU DE PAS</label>
            </div>
        </div>
        <br>
        <div class="inputContainer">
            <div class="campo">
                <input type="password" name="usClauRep" class="input" placeholder="Repeteix la nova clau de pas" pattern="[A-Za-z0-9\s]+" id="clauRep" minlength="8">
                <label for="password" class="label">REPETEIX LA NOVA CLAU DE PAS</label>
            </div>
        </div>

        <i id="clausDiferents"></i>
        <br><br><br>

        <i>Dades personals:</i>
        <br><br><br>
        <div class="inputContainer">
            <input type="text" name="usNom" class="input" placeholder="<?php echo $dadesUsuari['nom']; ?>" id="nom">
            <label class="label">NOM</label>
        </div>
        <br>
        <div class="inputContainer">
            <input type="text" name="usAdreca" class="input" placeholder="<?php echo $dadesUsuari['adreca']; ?>" pattern="[A-Za-z0-9\s]+" maxlength="30" id="adreca"><br />
            <label class="label">ADREÇA</label>
        </div>
        <br>
        <div class="inputContainer">
            <input type="text" name="usPoblacio" placeholder="<?php echo $dadesUsuari['poblacio']; ?>" class="input" pattern="[A-Za-z0-9\s]+" maxlength="30" id="poblacio">
            <label class="label">POBLACIÓ</label>
        </div>
        <br>
        <div class="inputContainer">
            <input type="text" name="usPostal" placeholder="<?php echo $dadesUsuari['postal']; ?>" class="input" pattern="[0-9]+" minlength="5" maxlength="5" id="postal">
            <label class="label">CODI POSTAL</label>
        </div>
        <input type="submit" class="submitBtn" value="Actualitza les dades">
    </form>
</div>

<br><br>

<script>
    $('#clau, #clauRep').on('keyup', function() {
        if ($('#clau').val() == $('#clauRep').val()) {
            $('#clausDiferents').html('Clau repetida correctament.').css('color', '#08ff00');
        } else
            $('#clausDiferents').html('Les claus introduïdes són diferents!').css('color', '#b70f00');
    });
</script>