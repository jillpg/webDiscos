<h3>Les meves compres</h3>
<p>Aquest és l'històric de comandes que heu dut a terme:</p>
<div class="llistatComandes">
    <div class="productesComanda">
        <?php if ($comandes == null) { ?>
            <i>No hi ha cap comanda prèvia!</i>
        <?php } else { ?>
            <?php foreach ($comandes as $comanda) { ?>

                <?php
                // Suprimeix els {} dels arrays
                $comanda['idProducte'] = substr($comanda['idProducte'], 1, -1);
                $comanda['nomProducte'] = substr($comanda['nomProducte'], 1, -1);
                $comanda['quantitatProducte'] = substr($comanda['quantitatProducte'], 1, -1);
                $comanda['preuProducte'] = substr($comanda['preuProducte'], 1, -1);
                $comanda['formatProducte'] = substr($comanda['formatProducte'], 1, -1);

                // Suprimeix els "" dels arrays que en tinguin
                $comanda['nomProducte'] = str_replace('"', '', $comanda['nomProducte']);

                // Separa els elements de la comanda en arrays
                $comanda['idProducte'] = explode(",", $comanda['idProducte']);
                $comanda['nomProducte'] = explode(",", $comanda['nomProducte']);
                $comanda['quantitatProducte'] = explode(",", $comanda['quantitatProducte']);
                $comanda['preuProducte'] = explode(",", $comanda['preuProducte']);
                $comanda['formatProducte'] = explode(",", $comanda['formatProducte']);

                ?>

                <?php //print_r($comanda); 
                ?>
                Comanda feta el <?php echo $comanda['data'] . " / " . $comanda['hora']; ?>
                <br>
                <table class="taulaComanda" border="1">
                    <tr>
                        <th class="producteTaulaComanda" colspan="1"> Producte </th>
                        <th class="quantitatTaulaComanda" colspan="1"> Quantitat </th>
                        <th class="preuTaulaComanda" colspan="1"> Preu/u </th>
                        <th class="totalTaulaComanda" colspan="1"> Preu total </th>
                    </tr>
                    <?php $total = 0; ?>
                    <?php for ($i = 0; $i < count($comanda['idProducte']); $i++) { ?>
                        <tr class="detallsProducteComanda">
                            <td> <?php echo $comanda['nomProducte'][$i]; ?> (<?php echo $comanda['formatProducte'][$i]; ?>) </td>
                            <td> <?php echo $comanda['quantitatProducte'][$i]; ?> </td>
                            <td> <?php echo $comanda['preuProducte'][$i]; ?> € </td>
                            <td> <?php echo ($comanda['preuProducte'][$i] * $comanda['quantitatProducte'][$i]); ?> € </td>
                        </tr>
                        <?php $total += ($comanda['preuProducte'][$i] * $comanda['quantitatProducte'][$i]); ?>
                    <?php } ?>
                    <tr>
                        <th colspan="3"> <i>Total:</i> </th>
                        <th> <?php echo $total; ?> € </th>
                    </tr>
                </table>
                <br><br>
            <?php } ?>
        <?php } ?>
    </div>
</div>