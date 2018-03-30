<?php setcookie('auth','',time()-3600,'/','localhost',false,true);
      unset($_SESSION);
      unset($_COOKIE);
      session_destroy();
      header("Location:".BASE_URL);
      die();