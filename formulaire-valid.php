<?php
        $serveur = "localhost"; $dbname = "cours"; $user = "root"; $pass = "root";
        
        $nom = valid_donnees($_POST["nom"]);
        $prénom = valid_donnees($_POST["prénom"]);
        $email = valid_donnees($_POST["email"]);
        $message = valid_donnees($_POST["message"]);
        
        function valid_donnees($donnees){
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
        }
        
        /*Si les champs nom,prenom et mail ne sont pas vides et si les donnees ont
         *bien la forme attendue...*/
        if (!empty($prenom)
            && strlen($prenom) <= 20
            && preg_match("^[A-Za-z '-]+$",$prenom)
            && (!empty($nom)
            && strlen($nom) <= 20
            && preg_match("^[A-Za-z '-]+$",$nom))
            && !empty($mail)
            && filter_var($mail, FILTER_VALIDATE_EMAIL)){
        
            try{
                //On se connecte à la BDD
                $dbco = new PDO("mysql:host=$eerveur;dbname=$dbname",$user,$pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //On insère les données reçues
                $sth = $dbco->prepare("
                    INSERT INTO form(prenom, mail, age, sexe, pays)
                    VALUES(:prenom, :mail, :age, :sexe, :pays)");
                $sth->bindParam(':prenom',$prenom);
                $sth->bindParam(':mail',$mail);
                $sth->bindParam(':age',$age);
                $sth->bindParam(':sexe',$sexe);
                $sth->bindParam(':pays',$pays);
                $sth->execute();
                //On renvoie l'utilisateur vers la page de remerciement
                header("Location:form-merci.html");
            }
            catch(PDOException $e){
                echo 'Erreur : '.$e->getMessage();
            }
        }else{
            header("Location:formulaire.html");
        }
    ?>