<?php
    function get_user($raison_social,$mdp)
    {
        global $bdd;
       
        $user = $bdd->prepare("SELECT id_u,raison_social,email,mdp FROM users WHERE raison_social = :raison_social AND mdp = :mdp");
        $user->bindValue(':raison_social',$raison_social,PDO::PARAM_STR);
        $user->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $user->execute();
        
        return $user->fetch();
    }

    function get_user_cookie($id)
    {
        global $bdd;
        
        $user = $bdd->prepare("SELECT * FROM users WHERE id_u = :id");
        $user->bindValue(':id',$id,PDO::PARAM_INT);
        $user->execute();
        
        return $user->fetch();
    }