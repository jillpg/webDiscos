<h3>Cistella</h3>
<p>Aquests són tots els elements que heu afegit a la cistella:</p>
<div class="llistat">
    <div class="productesCistella">
        <?php if ($productes == null) { ?>
            <i>No hi ha cap producte a la cistella!</i>
        <?php } else { ?>
            <table class="taulaComanda" border="1">
                <tr>
                    <th class="producteTaulaComanda" colspan="1"> Producte </th>
                    <th class="quantitatTaulaComanda" colspan="1"> Quantitat </th>
                    <th class="preuTaulaComanda" colspan="1"> Preu/u </th>
                    <th class="totalTaulaComanda" colspan="1"> Preu total </th>
                </tr>
                <?php $i = 0;
                $total = 0; ?>
                <?php foreach ($productes as $producte) { ?>
                    <tr class="detallsProducteComanda">
                        <td> <?php echo $infoProductes[$i]['nom']; ?> (<?php echo $infoProductes[$i]['format']; ?>) </td>
                        <td> <?php echo $quantitats[$i]; ?> </td>
                        <td> <?php echo $preus[$i]; ?> € </td>
                        <td> <?php echo ($preus[$i] * $quantitats[$i]); ?> € </td>
                    </tr>
                    <?php $total += ($preus[$i] * $quantitats[$i]);
                    $i++; ?>
                <?php } ?>
                <tr>
                    <th colspan="3"> <i>Total:</i> </th>
                    <th> <?php echo $total; ?> € </th>
                </tr>
            </table>
        <?php } ?>
    </div>
</div>

<?php if ($productes != null) { ?>
    <button class="buidaCistella" onclick="buidaCistella()">Buida la cistella</button>
    <br><br>
    <button class="compra" onclick="compra(<?php echo $total; ?>)">Compra els productes de la cistella</button>
<?php } ?>

<script>
    function buidaCistella() {
        window.location.href = "index.php?accio=cistella&cistella=buida";
    }

    function compra(totals) {
        if (totals == 0) {
            alert("No tens cap producte a la cistella!");
        } else if (<?php echo isset($_SESSION['usuari']) ? 1 : 0; ?> == 0) {
            alert("Per poder comprar inicieu sessió.");
        } else {
            window.location.href = "index.php?accio=cistella&cistella=compra";
        }
    }
</script>