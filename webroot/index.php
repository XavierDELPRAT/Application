<?php
    session_start();

	define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));

    require "../core/constantes.php";
    require "../core/functions.php";
    require "../core/session.php";
    require "../models/connexion.php";

    if(!isset($_SESSION['id']) || $_SESSION['id'] == null)
    {
        include "../controllers/login.php";
    }
    elseif(isset($_GET['p']) && $_GET['p'] == "ajax")
    {
        include "../models/ajax.php";
    }
    else
    {
        if(!isset($_GET['p']) || $_GET['p']=="") $_GET['p'] = 'accueil';
        if(!file_exists("../controllers/".$_GET['p'].".php")) $_GET['p'] = '404';

        ob_start();
           include "../controllers/".$_GET['p'].".php";
           $content = ob_get_contents();
        ob_end_clean();

        include "../controllers/layout.php";
    }
?>