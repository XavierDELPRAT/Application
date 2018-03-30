<?php 
    function get_clients($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT * FROM clients WHERE id_u = ".$id)->fetchAll();
    }

    function get_classes($id_cli)
    {
        global $bdd;
        
        return $bdd->query("SELECT * FROM classes WHERE id_cli = ".$id_cli)->fetchAll();
    }


    function add_classe($id_cli,$libelle)
    {
        global $bdd;
        
        $requete = $bdd->prepare("INSERT INTO classes(libelle,id_cli) VALUES(:libelle,:id_cli)");
        $requete->bindValue(':libelle',$libelle,PDO::PARAM_STR);
        $requete->bindValue(':id_cli',$id_cli,PDO::PARAM_INT);
        $requete->execute();
    }

    function add_clients_prestations($id_cli,$id_presta,$tarif)
    {
        global $bdd;
        
        $requete = $bdd->prepare("INSERT INTO clients_prestations(id_cli,id_presta,tarif) VALUES(:id_cli,:id_presta,:tarif)");
        $requete->bindValue(':id_cli',$id_cli,PDO::PARAM_INT);
        $requete->bindValue(':id_presta',$id_presta,PDO::PARAM_INT);
        $requete->bindValue(':tarif',$tarif,PDO::PARAM_STR);
        $requete->execute();
    }

    function delete_classes($id_cli)
    {
        global $bdd;
        
        $bdd->query("DELETE FROM classes WHERE id_cli = ".$id_cli);
    }

    function delete_client_prestations($id_cli)
    {
        global $bdd;
        
        $bdd->query("DELETE FROM clients_prestations WHERE id_cli = ".$id_cli);
    }


    function update_client($params)
    {
        global $bdd;
        
        extract($params);
        
        $requete = $bdd->prepare("UPDATE clients SET raison_social = :raison_social,
                                                     destinataire = :destinataire,
                                                     email = :email,
                                                     emailcc = :emailcc,
                                                     adresse = :adresse,
                                                     cp = :cp,
                                                     ville = :ville,
                                                     id_encaiss = :id_encaiss,
                                                     id_type = :id_type,
                                                     id_u = :id_u
                                                     WHERE id_cli = :id_cli");
        $requete->bindValue(":raison_social",$raison_social,PDO::PARAM_STR);
        $requete->bindValue(":destinataire",$destinataire,PDO::PARAM_STR);
        $requete->bindValue(":email",$email,PDO::PARAM_STR);
        $requete->bindValue(":emailcc",$emailcc,PDO::PARAM_STR);
        $requete->bindValue(":adresse",$adresse,PDO::PARAM_STR);
        $requete->bindValue(":cp",$cp,PDO::PARAM_STR);
        $requete->bindValue(":ville",$ville,PDO::PARAM_STR);
        $requete->bindValue(":id_encaiss",$id_encaiss,PDO::PARAM_INT);
        $requete->bindValue(":id_type",$id_type,PDO::PARAM_INT);
        $requete->bindValue(":id_u",$id_u,PDO::PARAM_INT);
        $requete->bindValue(":id_cli",$id_cli,PDO::PARAM_INT);
        $requete->execute();
    }

    function delete_client($id_cli)
    {
        global $bdd;
        
        $bdd->query("UPDATE clients SET etat = 0 WHERE id_cli = ".$id_cli);
    }

    function activate_client($id_cli)
    {
        global $bdd;
        
        $bdd->query("UPDATE clients SET etat = 1 WHERE id_cli = ".$id_cli);
    }

    function get_types()
    {
        global $bdd;
        
        return $bdd->query("SELECT * FROM types_client")->fetchAll();
    }

    function get_encaissements()
    {
        global $bdd;
        
        return $bdd->query("SELECT * FROM encaissements")->fetchAll();
    }

    function get_prestations()
    {
        global $bdd;
        
        return $bdd->query("SELECT id_presta,libelle FROM prestations")->fetchAll();
        
    }

    function get_client_prestations($id_cli)
    {
        global $bdd;
        
        return $bdd->query("SELECT p.id_presta,libelle,tarif FROM prestations p 
                            INNER JOIN clients_prestations cp ON p.id_presta = cp.id_presta
                            WHERE id_cli = ".$id_cli)->fetchAll();
        
    }