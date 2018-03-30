<?php require "../models/parametres.php";

      $title = "Paramètres";

      if(isset($_POST['edit']))
      {
          $message = "";
          $i = 0;
          if(!verifInput($_POST['raison_social']))
          {
              $message .= "La raison social est vide <br>";
              $i++;
          }
          if(!verifInput($_POST['destinataire']))
          {
              $message .= "Le destinataire est vide <br>";
              $i++;
          }
          if(!verifInput($_POST['email'],"[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"))
          {
              $message .= "L'email est vide ou non conforme ex:elvis@hotmail.com<br>";
              $i++;
          }
          if(!empty($_POST['emailcc']) && !verifInput($_POST['emailcc'],"[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"))
          {
              $message .= "L'emailcc est non conforme ex:elvis@hotmail.com<br>";
              $i++;
          }
          if(!verifInput($_POST['adresse']))
          {
              $message .= "L'adresse est vide' <br>";
              $i++;
          }
          if(!verifInput($_POST['cp'],"[0-9]{5}|2A|2B"))
          {
              $message .= "Le code postal est vide ou non conforme<br>";
              $i++;
          }
          if(!verifInput($_POST['ville'],"([A-Z][a-z]+[ -]?)+"))
          {
              $message .= "La ville est vide ou non conforme<br>";
              $i++;
          }
          
          if($i > 0)
          {
              setFlash("Vous avez $i erreur(s) <br> $message","danger");
          }
          else
          {
              update_client($_POST);
              delete_classes($_POST['id_cli']);
              delete_client_prestations($_POST['id_cli']);
              
              if($_POST['id_type'] == 2)
              {
                  foreach($_POST['classes'] as $classe)
                  {
                      if(verifInput($classe,"[A-Za-z0-9 -]+"))
                          add_classe($_POST['id_cli'],$classe);
                  }
              }
              
              foreach($_POST['tarifs'] as $k => $tarif)
              {
                  if(verifInput($tarif,"[0-9.]+"))
                      add_clients_prestations($_POST['id_cli'],$_POST['prestations'][$k],$tarif);
              }
              
              setFlash("Le client a bien été mis à jour");
              header("Location:".BASE_URL."/parametres");
              die();
          }
        
          setFlash("Le client a bien été mis à jour");
      }

      if(isset($_POST['supp']))
      {
          delete_client((int)$_POST['id_cli']);
          setFlash("Le client a été désactivé");
      }

      if(isset($_POST['activate']))
      {
          activate_client((int)$_POST['id_cli']);
          setFlash("Le client a été réactivé");
      }

      $clients = get_clients((int)$_SESSION['id']);

      foreach($clients as $k => $client)
      { 
          $clients[$k]['classes'] = get_classes($client['id_cli']);
      }

      foreach($clients as $k => $client)
      { 
          $clients[$k]['prestations'] = get_client_prestations($client['id_cli']);
      }

      $encaissements = get_encaissements();
      $types = get_types();
      $prestations = get_prestations();

      require "../views/parametres.php";