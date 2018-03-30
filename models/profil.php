<?php 
    function get_user($id)
    {
        global $bdd;
        
        return $bdd->query("SELECT * FROM users WHERE id_u = ".$id)->fetch();
    }

    function update_user($params)
    {
        global $bdd;
        
        extract($params);
        
        $requete = $bdd->prepare("UPDATE users SET raison_social = :raison_social,
                                                  siren = :siren,
                                                  adresse = :adresse,
                                                  cp = :cp,
                                                  ville = :ville,
                                                  tel = :tel,
                                                  email = :email,
                                                  mdp = :mdp
                                                  WHERE id_u = :id_u");
        $requete->bindValue(':raison_social',$raison_social,PDO::PARAM_STR);
        $requete->bindValue(':siren',$siren,PDO::PARAM_STR);
        $requete->bindValue(':adresse',$adresse,PDO::PARAM_STR);
        $requete->bindValue(':cp',$cp,PDO::PARAM_STR);
        $requete->bindValue(':ville',$ville,PDO::PARAM_STR);
        $requete->bindValue(':tel',$tel,PDO::PARAM_STR);
        $requete->bindValue(':email',$email,PDO::PARAM_STR);
        $requete->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $requete->bindValue(':id_u',$id_u,PDO::PARAM_INT);
        $requete->execute();
        
        
    }

    function delete_user($id)
    {
        global $bdd;
        
        $bdd->query("DELETE FROM users WHERE id_u = ".$id);
    }