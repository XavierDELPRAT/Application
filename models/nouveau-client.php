<?php
    function add_client($params)
    {
        global $bdd;
        
        extract($params);
        
        $requete = $bdd->prepare("INSERT INTO clients(raison_social,destinataire,email,emailcc,adresse,cp,ville,id_encaiss,id_type,id_u) 
                                  VALUES(:raison_social,:destinataire,:email,:emailcc,:adresse,:cp,:ville,:id_encaiss,:id_type,:id_u)");
        $requete->bindValue(':raison_social',$raison_social,PDO::PARAM_STR);
        $requete->bindValue(':destinataire',$destinataire,PDO::PARAM_STR);
        $requete->bindValue(':email',$email,PDO::PARAM_STR);
        $requete->bindValue(':emailcc',$emailcc,PDO::PARAM_STR);
        $requete->bindValue(':adresse',$adresse,PDO::PARAM_STR);
        $requete->bindValue(':cp',$cp,PDO::PARAM_STR);
        $requete->bindValue(':ville',$ville,PDO::PARAM_STR);
        $requete->bindValue(':id_encaiss',$encaissement,PDO::PARAM_INT);
        $requete->bindValue(':id_type',$type,PDO::PARAM_INT);
        $requete->bindValue(':id_u',$id_u,PDO::PARAM_INT);
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

    function add_classe($id_cli,$libelle)
    {
        global $bdd;
        
        $requete = $bdd->prepare("INSERT INTO classes(libelle,id_cli) VALUES(:libelle,:id_cli)");
        $requete->bindValue(':libelle',$libelle,PDO::PARAM_STR);
        $requete->bindValue(':id_cli',$id_cli,PDO::PARAM_INT);
        $requete->execute();
    }

    function get_encaissements()
    {
        global $bdd;
        
        return $bdd->query("SELECT id_encaiss,libelle FROM encaissements")->fetchAll();
        
    }

    function get_types_client()
    {
        global $bdd;
        
        return $bdd->query("SELECT id_type,libelle FROM types_client")->fetchAll();
        
    }

    function get_prestations()
    {
        global $bdd;
        
        return $bdd->query("SELECT id_presta,libelle FROM prestations")->fetchAll();
        
    }