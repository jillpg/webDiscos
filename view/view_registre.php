<h3>No estàs registrat? Crea el teu compte en segons!</h3>
<div class="formulariRegistre">
    <form action="index.php?accio=registre" class="formulari" method="post">
        <br>
        <div class="inputContainer">
            <input type="text" name="regNom" class="input" placeholder="Nom" value="" required>
            <label class="label">NOM</label>
        </div>
        <br>
        <div class="inputContainer">
            <input type="email" name="regCorreu" class="input" placeholder="Correu electrònic" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="" required>
            <label class="label">CORREU ELECTRÒNIC</label>
        </div>
        <br>
        <div class="inputContainer">
            <div class="campo">
                <input type="password" name="regClau" class="input" placeholder="Clau de pas" pattern="[A-Za-z0-9\s]+" id="password" value="" minlength="8" required>
                <label for="password" class="label">CLAU DE PAS</label>
            </div>
        </div>
        <br>
        <div class="inputContainer">
            <input type="text" name="regAdreca" class="input" placeholder="Adreça" pattern="[A-Za-z0-9\s]+" maxlength="30" value="" required><br />
            <label class="label">ADREÇA</label>
        </div>
        <br>
        <div class="inputContainer">
            <input type="text" name="regPoblacio" placeholder="Població" class="input" pattern="[A-Za-z0-9\s]+" maxlength="30" value="" required>
            <label class="label">POBLACIÓ</label>
        </div>
        <br>
        <div class="inputContainer">
            <input type="text" name="regPostal" placeholder="Codi Postal" class="input" pattern="[0-9]+" minlength="5" maxlength="5" value="" required>
            <label class="label">CODI POSTAL</label>
        </div>
        <i>Tots els camps són obligatoris.</i>
        <input type="submit" class="submitBtn" value="Registra't">
    </form>
</div>
<br /> <br />