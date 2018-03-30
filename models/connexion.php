<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=perso_facturation;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Connexion impossible');
    }
