<?php
    function get_client($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT id_cli,raison_social, destinataire,email,emailcc,adresse,cp,ville,id_type FROM clients WHERE id_cli = ".$id)->fetch();
    }

    function get_classes($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT id_cla,libelle FROM classes WHERE id_cli = ".$id)->fetchAll();
    }

    function get_prestations($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT p.id_presta,p.libelle FROM prestations p 
                                                         INNER JOIN clients_prestations clp ON p.id_presta = clp.id_presta
                                                         INNER JOIN clients c ON c.id_cli = clp.id_cli
                            WHERE c.id_cli = ".$id)->fetchAll();
    }

    function get_pourcentage_prestations($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT p.libelle,ROUND((SUM(nbh*tarif)/(SELECT SUM(nbh*tarif) FROM suivi s 
                                                                    INNER JOIN prestations p ON s.id_presta = p.id_presta 
                                                                    INNER JOIN clients_prestations clp ON p.id_presta = clp.id_presta 
                                                                    WHERE id_cli = ".$id." AND year(ref_date) = year(curdate()))) * 100,1) AS pourcentage
                            FROM suivi s INNER JOIN prestations p ON s.id_presta = p.id_presta 
                                         INNER JOIN clients_prestations clp ON p.id_presta = clp.id_presta 
                                         WHERE id_cli = ".$id." AND year(ref_date) = year(curdate()) 
                                         GROUP BY p.id_presta")->fetchAll();
    }

    function get_ca_mensuels($id,$year)
    {
        global $bdd;
        
        return $bdd->query("SELECT MONTH(ref_date) AS mois,SUM(nbh * tarif) AS montant 
                            FROM suivi s 
						    INNER JOIN prestations p ON s.id_presta = p.id_presta
                            INNER JOIN clients_prestations clp ON p.id_presta = clp.id_presta 
                            WHERE year(ref_date) = ".$year." AND id_cli = ".$id." 
                            GROUP BY MONTH(ref_date) ORDER BY MONTH(ref_date)")->fetchAll();
    }

    function add_suivi($id_cla,$id_presta,$ref_date,$nbh)
    {
        global $bdd;
        
        $requete = $bdd->prepare("INSERT INTO date(ref_date) VALUES(:ref_date)");
        $requete->bindValue(":ref_date",$ref_date,PDO::PARAM_STR);
        $requete->execute();
    
        $requete = $bdd->prepare("INSERT INTO suivi(id_cla,id_presta,ref_date,nbh) VALUES(:id_cla,:id_presta,:ref_date,:nbh)");
        $requete->bindValue(":id_cla",$id_cla,PDO::PARAM_INT);
        $requete->bindValue(":id_presta",$id_presta,PDO::PARAM_INT);
        $requete->bindValue(":ref_date",$ref_date,PDO::PARAM_STR);
        $requete->bindValue(":nbh",$nbh,PDO::PARAM_STR);
        $requete->execute();
    }
