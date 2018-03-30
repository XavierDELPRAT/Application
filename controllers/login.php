<?php require "../models/login.php";

      if(isset($_POST['submit']))
      {
          extract($_POST);
          $mdp = sha1($mdp);
    
          $user = get_user($raison_social,$mdp);
				
          if($user)
          {
				$_SESSION['id'] = $user['id_u'];
              
                if(isset($_POST['remember']))
                {
                    setcookie('auth',$user['id_u'].'-----'.sha1($user['raison_social'].$user['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);
                }
              
                header("Location:".BASE_URL);
                die();
          }
          else
               setFlash("Mauvais identifiant","danger");
      }
			
      if(isset($_COOKIE['auth']) && !isset($_SESSION['id']))
      {
          $auth = $_COOKIE['auth'];
          $auth = explode('-----',$auth);
          $user = get_user_cookie((int)$auth[0]);
          if($user)
          {
              $key = sha1($user['raison_social'].$user['mdp'].$_SERVER['REMOTE_ADDR']);
              if($key == $auth[1])
              {
                    $_SESSION['id'] = $user['id_u'];
                    setcookie('auth',$user['id_u'].'-----'.sha1($user['raison_social'].$user['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);
                    header("Location:".BASE_URL);
                    die();	
              }
          }
          setcookie('auth','',time()-3600,'/','localhost',false,true);
      }
    
      require "../views/login.php";



