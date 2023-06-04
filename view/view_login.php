<h3>Inicia la sessió a continuació</h3>
<div class="formulariIniciSessio">
    <form action="index.php?accio=login" class="formulari" method="post">
        <br>
        <div class="inputContainer">
            <input type="email" name="loginCorreu" class="input" placeholder="Correu electrònic" pattern="^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" value="" required>
            <label class="label">CORREU ELECTRÒNIC</label>
        </div>
        <br>
        <div class="inputContainer">
            <div class="campo">
                <input type="password" name="loginClau" class="input" placeholder="Clau de pas" pattern="[A-Za-z0-9\s]+" id="password" value="" minlength="8" required>
                <label for="password" class="label">CLAU DE PAS</label>
            </div>
        </div>
        <i>Tots els camps són obligatoris.</i>
        <input type="submit" class="submitBtn" value="Inicia sessió">
    </form>

    <br /> <br />

    <a href="index.php?accio=registre" class="botoRegistre">No tens compte? Registra't aquí</a>
</div>
<br /> <br />