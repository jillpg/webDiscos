<header id="capçalera">

    <h1>Discos Metàl·lic</h1>

    <br />

    <hr class="separadorCapçalera" />

    <nav id="navegacio">
        <div class="navbar">

            <ul>
                <?php if (isset($pagina)) {
                    if (
                        $pagina == 'productes' or
                        $pagina == 'categories' or
                        $pagina == 'productesCategoria' or
                        $pagina == 'detallProducte'
                    ) { ?>
                        <li class="menu"><a class="elementNav" id="nav1" href="#" onclick="accioPP('')">INICI</a></li>
                        <li class="menu"><a class="elementNav" id="nav2" href="#" onclick="accioPP('categories')">GÈNERES</a></li>
                    <?php } else { ?>
                        <li class="menu"><a class="elementNav" id="nav1" href="index.php">INICI</a></li>
                        <li class="menu"><a class="elementNav" id="nav2" href="index.php?accio=categories">GÈNERES</a></li>
                    <?php } ?>
                <?php } else { ?>
                    <li class="menu"><a class="elementNav" id="nav1" href="index.php">INICI</a></li>
                    <li class="menu"><a class="elementNav" id="nav2" href="index.php?accio=categories">GÈNERES</a></li>
                <?php } ?>

                <?php if ($usuari == null or $usuari == "") { ?>
                    <li class="menu"><a class="elementNav" id="nav3" href="index.php?accio=login">INCIA SESSIÓ</a></li>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="dropbtn">USUARI (<?php echo($usuari[1] . " / " . $usuari[0]) ?>)</button>
                        <div class="dropdown-content">
                            <a href="index.php?accio=usuari">EL MEU COMPTE</a>
                            <a href="index.php?accio=comandes">LES MEVES COMPRES</a>
                            <a href="index.php?accio=logout">TANCA LA SESSIÓ</a>
                        </div>
                    </div>
                <?php } ?>

                <?php $nElementsCistella = 0;
                $preuTotal = 0;
                $i = 0;
                if (isset($_SESSION['quantitats']) && isset($_SESSION['preus']) != null) {
                    foreach ($_SESSION['quantitats'] as $quantitat) {
                        $nElementsCistella += $quantitat;
                        $preuTotal += $quantitat * $preus[$i];
                        $i++;
                    }
                } ?>

                <?php if ($nElementsCistella == 0) { ?>
                    <li class="menu"><a class="elementNav" id="nav4" href="index.php?accio=cistella">CISTELLA</a></li>
                <?php } else { ?>
                    <li class="menu"><a class="elementNav" id="nav4" href="index.php?accio=cistella">CISTELLA (<?php echo $nElementsCistella; ?> / <?php echo $preuTotal; ?> €)</a></li>
                <?php } ?>

            </ul>
        </div>
    </nav>

    <hr class="invisible" />

</header>