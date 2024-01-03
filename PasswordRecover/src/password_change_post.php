
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../../styles.css" rel="stylesheet">
  
  <title>carrefour espace client</title>

</head>

<body>
  <header>
    <nav>
      <img src="../../images/carefour.jpg" width="30" alt="Logo carefour">
      <div>
        <a href="../../index.html">Accueil</a>
        <a href="../../index.html">À propos</a>
      </div>
    </nav>
  </header>
  <main id="main">

    <section id="block2">
      <div class="photo-acceuil">
        <div>
          <img src="images/familles.jpg" alt="">
        </div>
        <div>
          <h1>Profitez de tous les avantages de l'Espace Perso !</h1>
        </div>
      </div>
    <div class="login-form">
        <?php 
            require_once __DIR__.'/config.php';

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
        </div>
    </section>

  </main>

  <footer>
    <img src="../../images/carefour.jpg" width="30" alt="Logo carrefour">
    <div>
      <a target="_blank" href="https://twitter.com/" class="lien-icone">
        <img src="../../images/facebook.png" width="30" alt="Logo Twitter">
      </a>
      <a target="_blank" href="https://www.instagram.com/" class="lien-icone">
        <img src="../../images/instagram.png" width="30" alt="Logo Instagram">
      </a>
    </div>
  </footer>
</body>

</html>