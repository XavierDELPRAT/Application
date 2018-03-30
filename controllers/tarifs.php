<?php

    echo $tarif = $bdd->query("SELECT tarif from clients_prestations WHERE id_presta = 1 AND id_cli = 14")->fetchColumn();
?>