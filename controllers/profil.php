<?php require "../models/profil.php";

      $title = "Profil";

      if(isset($_POST['edit']))
      {
          $message = "";
          $i = 0;
          if(!verifInput($_POST['raison_social']))
          {
              $message .= "La raison social est vide <br>";
              $i++;
          }
          if(!verifInput($_POST['siren'],"[0-9]{3}([ ]?[0-9]{3}){2}"))
          {
              $message .= "Le siren est vide ou non conforme ex:000 000 000 <br>";
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
          if(!verifInput($_POST['tel'],"(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}"))
          {
              $message .= "Le téléphone est vide ou non conforme ex:01 01 01 01 01<br>";
              $i++;
          }
          if(!verifInput($_POST['email'],"[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}"))
          {
              $message .= "L'email est vide ou non conforme ex:elvis@hotmail.com<br>";
              $i++;
          }
          if(!verifInput($_POST['mdp'],"[A-Za-z0-9]{8,25}"))
          {
              $message .= "Le mdp est vide ou fait moins de 8 lettres et chiffres<br>";
              $i++;
          }
          
          if($i > 0)
          {
              setFlash("Vous avez $i erreur(s) <br> $message","danger");
          }
          else
          {
              $_POST['mdp'] = sha1($_POST['mdp']);

              update_user($_POST);
              setFlash("Votre profil a bien été mis à jour");
          }
      }
      
      if(isset($_POST['supp']))
      {
          delete_user((int)$_POST['id_u']);
          header("Location:".BASE_URL."/logout");
          die();
      }

      $user = get_user((int)$_SESSION['id']);
      
      require "../views/profil.php";