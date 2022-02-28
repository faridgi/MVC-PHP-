<?php
require_once"controleur.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
    integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>

   
</head>
<body>
    <div class="container">
        <h1>Gestion des clients</h1>
   
    <form action="#" method="get" class="form-inline">
    <label for="nom">Nom : </label>
        <input type="hidden" name="action" value="<?= $form_action ?>">
        <input type="hidden" name="id" value="<?= $client->id ?>">
        <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?= $client->nom ?>">
        <label for="nom">Ville : </label>
        <input type="text" name="ville" class="form-control" placeholder="Ville" value="<?= $client->ville ?>">
        <label for="nom">Téléphone : </label>
        <input type="text" name="tel" class="form-control" placeholder="téléphone" value="<?= $client->telephone ?>">
        <button class="btn btn-success">
            <?php if($client->id == -1) : ?>
                Ajouter
            <?php else : ?>
                Modifier
            <?php endif; ?>
        </button>
    </form>
    <br>
    <table class="table table-stiped">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Ville</th>
            <th>Téléphone</th>
        </tr>
        <?php foreach ($clients as $c) :?>
        <tr>
            <td><?= $c->id ?></td>
            <td><?= $c->nom ?></td>
            <td><?= $c->ville ?></td>
            <td><?= $c->telephone ?></td>
            <td>
                <a href="?action=del&id=<?= $c->id ?>" class="btn btn-danger">
                    <span class="glyphicon glyphicon-minus-sign"></span>
                </a>
            </td>

            <td>
                <a href="?action=edit&id=<?= $c->id ?>" class="btn btn-primary">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
            </td>
        <?php endforeach; ?>
    </table>
    </div>
</body>
</html>