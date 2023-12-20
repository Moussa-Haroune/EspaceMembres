<?php 
    require_once __DIR__.'/../config/config.php';

    if(isset($_POST['password']) && isset($_POST['password_repeat']) && isset($_POST['token']))
    {
        if(!empty($_POST['password']) && !empty($_POST['password_repeat']) && !empty($_POST['token']))
        {
            $password = htmlspecialchars($_POST['password']);
            $password_repeat = htmlspecialchars($_POST['password_repeat']);
            $token = htmlspecialchars($_POST['token']);

            $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE token =?');
            $check->execute(array($token));
            $row = $check->rowCount();
            if($row){

                if($password === $password_repeat){
                    
                    $password = hash('sha256', $password);
                    $update = $bdd->prepare('UPDATE utilisateurs SET password = ? WHERE token = ?');
                    $update->execute(array($password, $token));

                    $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                    $delete ->execute(array($token));

                    echo "Le mot de passe à bien été modifié";
                }else{
                    echo "les mots de passes ne sont pas identiques";
                }
            }else{
                echo "compte nom existant";
            }
        }else{
            echo "Merci de renseigner un mot de passe";
        }
    }

?>