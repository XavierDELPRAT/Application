<?php

    function get_active_clients($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT id_cli,raison_social,id_type FROM clients WHERE etat = 1")->fetchAll();
    }