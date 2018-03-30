<?php require "../models/client.php";

      if(isset($_POST['submitCours']))
      {
        $j = 0;
        extract($_POST);
       
        for($i = 0; $i <3; $i++)
        {
            if(verifInput($nbs[$i],"[0-9.]+"))
            {
                $j++;
                if(verifInput($dates[$i],"[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"))
                {
                    add_suivi($classes[$i],$prestations[$i],$dates[$i],$nbs[$i]);
                }
            }
        }

        if($j > 0)
            setFlash("Les heures ont bien été ajoutées");
        else
            setFlash("Aucune heure n'a été saisie","danger");
        
        header("Location:".BASE_URL."/client/".(int)$_GET['id']);
        die();
      }

      $client = get_client((int)$_GET['id']);
      $classes = get_classes((int)$_GET['id']);
      $prestations = get_prestations((int)$_GET['id']);

      $title = ($client['id_type'] == 2 ) ? "Ecole ".$client['raison_social'] : $client['raison_social'];

      $ca_mensuels = get_ca_mensuels((int)$_GET['id'],date('Y'));
      $last_ca_mensuels = get_ca_mensuels((int)$_GET['id'],date('Y')-1);
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

      $pourcentage_prestations = get_pourcentage_prestations((int)$_GET['id']);
      

      require "../views/client.php";