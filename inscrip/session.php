<?php
    session_start();
    if(!isset($_SESSION['user']))
    header('Location:../index.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../styles.css" rel="stylesheet">
  
  <title>carrefour espace client </title>

</head>

<body>
  <header>
    <nav>
      <img src="../images/carefour.jpg" width="30" alt="Logo carefour">
      <div>
        <a href="session.php">Accueil</a>
        <a href="session.php">À propos</a>
        <a href="deconnexion.php" class="btn btn-danger btn-lg"> Déconnexion</a>
      </div>
    </nav>
  </header>

  <main id="main">

    <section id="block-lateral">
      <div class="open">
        <h2>Votre magasins <br>ouvert 10 janvier</h2>
        <img src="../images/signe-ouvert.png" width="120" alt="">
        <img src="../images/aide.png" width="160" alt="">
        <h2>Contacter nous </h2>
        <a href="" class="clic">cliquer ici</a>
      </div>
    </section>

    <section id="block2">
      <div class="photo-acceuil">
        <div>
          <img src="../images/familles.jpg" alt="">
        </div>
        <div>
          <h1> <h1> Bienvenue dans votre espace ! <?php echo $_SESSION['user']; ?> </h1></h1>
        </div>
      </div>

      <div class="Espace-client">
        <div>
            <h1>  Profitez de tous les avantages !</h1>
            <a class="clic" href="">cliqué ici pour découvrir notre catalogue</a>
        </div>

      </div>
    </section>

  </main>
  <footer>
    <img src="../images/carefour.jpg" width="30" alt="Logo carrefour">
    <div>
      <a target="_blank" href="https://twitter.com/" class="lien-icone">
        <img src="../images/facebook.png" width="30" alt="Logo Twitter">
      </a>
      <a target="_blank" href="https://www.instagram.com/" class="lien-icone">
        <img src="../images/instagram.png" width="30" alt="Logo Instagram">
      </a>
    </div>
  </footer>
</body>

</html>