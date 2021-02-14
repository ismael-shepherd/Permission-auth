<?php

require '../vendor/autoload.php';

use App\Auth;
use App\App;

session_start();

$auth = App::getAuth();
$error = false;

/*
if ($auth->user() !== null) {
    header('Location: index.php');
    exit();
}
*/

if (!empty($_POST)) {
$user = $auth->login($_POST['username'], $_POST['username']);
if ($user) {
    header('Location: index.php?login=1');
    exit();
 }
 $error = true;
}


?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="p-4">

<h1>Se connecter</h1>

<?php if($error): ?>
 <div class="alert alert-danger">
 <!--METTRE IDENTIFIANT OU MOT DE PASSE INCORRECT POUR EVITER DE DONNER DES PISTES AU HACK-->
    Mot de passe ou identifiant incorrect
 </div>
<?php endif ?>


<?php if(!empty($_GET['forbid'])): ?>
 <div class="alert alert-danger">
 <!--METTRE IDENTIFIANT OU MOT DE PASSE INCORRECT POUR EVITER DE DONNER DES PISTES AU HACK-->
    L'accès a la page est interdit
 </div>
<?php endif ?>

<form action="" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Pseudo">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
    </div>
    <button class="btn btn-primary">Valider</button>
</form>
    
</body>
</html>