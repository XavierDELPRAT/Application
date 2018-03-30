<?php
    require "../models/layout.php";

    $title = isset($title) ? $title : "Tableau de bord";

    $clients = get_active_clients((int)$_SESSION['id']);

    foreach($clients as $k => $client)
    {
        if($client['id_type'] == 2)
            $clients[$k]['raison_social'] = "Ecole ".$clients[$k]['raison_social'];
    }

    $script = isset($script) ? $script : '';
    
    require "../views/layout.php";