<?php require "../models/nouveau-client.php";

      $title = "Nouveau client";

      if(isset($_POST['submit']))
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
              add_client($_POST);
              
              $id_cli = $bdd->lastInsertId();
              
              if($_POST['type'] == 2)
              {
                  foreach($_POST['classes'] as $classe)
                  {
                      if(verifInput($classe,"[A-Za-z0-9 -]+"))
                          add_classe($id_cli,$classe);
                  }
              }
              
              foreach($_POST['tarifs'] as $k => $tarif)
              {
                  if(verifInput($tarif,"[0-9.]+"))
                      add_clients_prestations($id_cli,$_POST['prestations'][$k],$tarif);
              }
              
              setFlash("Le client a bien été ajouté");
              header("Location:".BASE_URL."/nouveau-client");
              die();
          }
      }

      $encaissements = get_encaissements();
      $types = get_types_client();
      $prestations = get_prestations();

      require "../views/nouveau-client.php";