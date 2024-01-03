<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" rel="stylesheet">
  
  <title>carrefour espace client</title>

</head>

<body>
  <header>
    <nav>
      <img src="images/carefour.jpg" width="30" alt="Logo carefour">
      <div>
        <a href="./index.php">Accueil</a>
        <a href="./index.php">À propos</a>
      </div>
    </nav>
  </header>

  <main id="main">

    <section id="block-lateral">
      <div class="open">
        <h2>Votre magasins <br>ouvert 10 janvier</h2>
        <img src="images/signe-ouvert.png" width="120" alt="">
        <img src="images/aide.png" width="160" alt="">
        <h2>Contacter nous </h2>
        <a href="" class="clic">cliquer ici</a>
      </div>
    </section>

    <section id="block2">
      <div class="photo-acceuil">
        <div>
          <img src="images/familles.jpg" alt="">
        </div>
        <div>
          <h1>Profitez de tous les avantages de l'Espace Perso !</h1>
        </div>
      </div>

      <div class="Espace-client">
        <fieldset> <legend>Connecter à votre espace perso</legend>
            <?php 
                
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                            
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            <form  action="./inscrip/connexion.php" method="post">
                    <h2 class="text-center">Connexion</h2>       
                    <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    <button type="submit" class="btn btn-primary btn-block">Connexion</button>
            </form>
            <p class="text-center"><a href="./PasswordRecover/changePassword.php">mot de passe oublié ?</a></p>
            <p class="text-center"><a href="./inscrip/inscription.php">Inscription</a></p>
            <style>
                .login-form {
                    width: 340px;
                    margin: 50px auto;
                }
                .login-form form {
                    margin-bottom: 15px;
                    background: #f7f7f7;
                    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                    padding: 30px;
                }
                .login-form h2 {
                    margin: 0 0 15px;
                }
                .form-control, .btn {
                    min-height: 38px;
                    border-radius: 10px;
                }
                .btn {        
                    font-size: 15px;
                    font-weight: bold;
                }
            </style>
        </fieldset>

      </div>
    </section>

  </main>
  <footer>
    <img src="images/carefour.jpg" width="30" alt="Logo carrefour">
    <div>
      <a target="_blank" href="https://twitter.com/" class="lien-icone">
        <img src="images/facebook.png" width="30" alt="Logo Twitter">
      </a>
      <a target="_blank" href="https://www.instagram.com/" class="lien-icone">
        <img src="images/instagram.png" width="30" alt="Logo Instagram">
      </a>
    </div>
  </footer>
</body>

</html>