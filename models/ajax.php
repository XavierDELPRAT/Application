<?php
    $requete = $bdd->prepare("SELECT tarif FROM clients_prestations WHERE id_cli = :id_cli AND id_presta = :id_presta");
    $requete->bindValue(':id_cli',$_POST['id_cli'],PDO::PARAM_INT);
    $requete->bindValue(':id_presta',$_POST['id_presta'],PDO::PARAM_INT);
    $requete->execute();
    $reponse = $requete->fetch();
    
    echo $reponse['tarif'];   
?>