<DOCTYPE html>

<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="style.css">


</head>


<body>

  <?php
    $var = 'index';
    include ('menu.php');


    $message = null;
if (isset($_POST['title']) && isset($_POST['content'])) {
    try {
        $instance = new PDO("mysql:host=localhost;dbname=tp", 'tp', 'secret');
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
    $reponse = $instance->prepare('INSERT INTO article (title, content) VALUES(:test, :content)');
    $reponse->execute([
        'test' => $_POST['title'],
        'content' => $_POST['content'],
    ]);
    $message =  "Article bien ajouté";
}

    ?>


<form method="post"> <!--method="post" action="ajouter_article.php">-->

  <div class="row">

                 <div class="col">

                                 <label class="formulaire">Titre :</label>

                                 <input type="text" name="titre" />

                  </div>

  </div>

  <div class="row">

                 <div class="col">

                                 <label class="formulaire">Article :</label>

                                 <textarea name="article"></textarea>

                 </div>

  </div>


  <div class="row">

                 <div class="col">

                                 <label class="formulaire">Legende image :</label>

                                 <input type="text" name="image_legende" />

                 </div>

  </div>

  <input style="margin-left: 4em" type="submit" value="Envoyer" />

  <!--<button style="margin-left: 4em">Ajouter</button>-->

</form>

</body>
</html>
