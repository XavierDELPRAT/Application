<?php
    function get_ca_clients($id_u)
    {
        global $bdd;
        
        return $bdd->query("SELECT c.raison_social,c.id_type,SUM(nbh*tarif) AS ca FROM clients c 
                                                                                  INNER JOIN clients_prestations clp ON c.id_cli = clp.id_cli 
                                                                                  INNER JOIN prestations p ON clp.id_presta = p.id_presta
                                                                                  INNER JOIN suivi s ON p.id_presta = s.id_presta
                            WHERE c.etat = 1 AND year(ref_date) = year(curdate()) AND id_u = ".$id_u."
                            GROUP BY c.id_cli")->fetchAll();
    }

    function get_ca_mensuels($year)
    {
        global $bdd;
        
        return $bdd->query("SELECT MONTH(ref_date) AS mois,SUM(nbh * tarif) AS montant 
                            FROM suivi s 
						    INNER JOIN prestations p ON s.id_presta = p.id_presta
                            INNER JOIN clients_prestations clp ON p.id_presta = clp.id_presta 
                            WHERE year(ref_date) = ".$year."  
                            GROUP BY MONTH(ref_date) ORDER BY MONTH(ref_date)")->fetchAll();
    }

    function get_pourcentage_clients($id_u)
    {
        global $bdd;
        
        return $bdd->query("SELECT c.raison_social,c.id_type,ROUND(SUM(nbh*tarif)/(SELECT SUM(nbh*tarif) FROM suivi s 
                                                                                    INNER JOIN prestations p ON s.id_presta = p.id_presta 
                                                                                    INNER JOIN clients_prestations clp ON p.id_presta = clp.id_presta 
                                                                                    WHERE year(ref_date) = year(curdate())) * 100,1) AS pourcentage 
                                                    FROM clients c 
                                                    INNER JOIN clients_prestations clp ON c.id_cli = clp.id_cli 
                                                    INNER JOIN prestations p ON clp.id_presta = p.id_presta
                                                    INNER JOIN suivi s ON p.id_presta = s.id_presta
                            WHERE c.etat = 1 AND year(ref_date) = year(curdate()) AND id_u = ".$id_u."
                            GROUP BY c.id_cli")->fetchAll();
    }