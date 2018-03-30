<?php require "../models/accueil.php";

      $ca_clients = get_ca_clients((int)$_SESSION['id']);

      foreach($ca_clients as $k => $ca)
      {
        if($ca['id_type'] == 2)
            $ca_clients[$k]['raison_social'] = 'Ecole '.$ca_clients[$k]['raison_social'];
      }

      $ca_mensuels = get_ca_mensuels(date('Y'));
      $last_ca_mensuels = get_ca_mensuels(date('Y')-1);
      $tab_ca_mensuels = array(0,0,0,0,0,0,0,0,0,0,0,0);
      $tab_last_ca_mensuels = array(0,0,0,0,0,0,0,0,0,0,0,0);

      foreach($ca_mensuels as  $k => $ca)
      {
        $tab_ca_mensuels[$ca['mois']-1] = $ca['montant'];
      }

      foreach($last_ca_mensuels as  $k => $ca)
      {
        $tab_last_ca_mensuels[$ca['mois']-1] = $ca['montant'];
      }

      $tab_ca_mensuels = json_encode($tab_ca_mensuels); 
      $tab_last_ca_mensuels = json_encode($tab_last_ca_mensuels); 

      $pourcentage_clients = get_pourcentage_clients((int)$_SESSION['id']);

      foreach($pourcentage_clients as $k => $pourcentage)
      {
        if($pourcentage['id_type'] == 2)
            $pourcentage_clients[$k]['raison_social'] = 'Ecole '.$pourcentage_clients[$k]['raison_social'];
      }

      require "../views/accueil.php";