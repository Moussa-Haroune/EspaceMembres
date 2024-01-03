<?php
    require_once(__DIR__.'../config.php');

    if(isset($_POST['email']) && !empty($_POST['email']))
    {
        $email = htmlspecialchars($_POST['email']);

        // check pour verifier si l'utilisateur existe !
        $check = $bdd->prepare('SELECT token FROM utilisateurs WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();   // nombre de ligne que va nous renvoyer le requete sql

        // si row == 0 c'est à dire l'utilisateur n'est pas dans notre p
        if($row)
        {
            $token = bin2hex(openssl_random_pseudo_bytes(24));
            $token_user = $data['token'];

            $insert = $bdd->prepare('INSERT INTO password_recover(token_user, token) VALUES (?,?)');
            $insert->execute(array($token_user, $token));

            $link = 'recover.php?u='.base64_encode($token_user).'&token='.base64_encode($token);
            echo "<a href='$link'>lien</a>";
            
            // Pour envoyer le lien par e-mail commenter le 
            /*$to = $email;
            $subject = 'Récupération de mot de passe';
            $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $link";
            $headers = 'From: haroune.hmah@gmail.com'; // Remplacez cela par votre adresse e-mail

            // Utiliser la fonction mail() pour envoyer l'e-mail
            mail($to, $subject, $message, $headers);

            echo "Un lien de réinitialisation a été envoyé à votre adresse e-mail.";
            */
            
        } else{
            echo "Compte non existant";
        }
    }