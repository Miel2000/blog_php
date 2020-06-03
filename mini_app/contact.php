<?php
$title = "Nous contacter";
$nav = "contact";

require 'header.php';
require_once 'config.php';
require_once 'functions.php';

date_default_timezone_set('Europe/Paris');


// récupéré l'heure de today $heure
$heure = (int) ($_GET['heure'] ?? (int) date('G'));
$jour = (int) ($_GET['jour'] ??  date('d'));

$days = JOURS;
$creneaux = CRENEAUX[date('N') - 1];

echo "heure : " . $heure;




//recupéré le créneaux d'aujourd'hui $creneaux

// recupéré l'état d'ouverture du magasin, grace a la function in_creneaux
$ouvert_horraire = in_creneaux($jour, $heure, $creneaux);



?>
<br>

<div class="row">
    <div class="col-mb-8">
        <h1>Nous contacter</h1>
        <?php if ($ouvert_horraire) : ?>
            <div class="alert alert-success">
                Le Magasin est ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le Magasin est fermé
            </div>

        <?php endif; ?>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ducimus mollitia quam dolorum minus excepturi? Officia, necessitatibus libero fugiat quis, assumenda dolore molestiae nesciunt tenetur incidunt atque, laudantium unde! Dolores.
        </p>
    </div>
    <div class="col-md-5">


        <h3>Horraire d'ouvertures</h3>

        <form action="contact.php" method="GET">
            <div class="form-group">

                <select class="form-control" name="jour">
                    <?= select('jour', $jour, JOURS); ?>
                </select>

            </div>
            <input type="number" name="heure" value="<?= $heure ?>">
            <button type="submit" class="btn btn-primary">Vérifier horraire</button>

        </form>

        <?php foreach (JOURS as $k => $jour) : ?>

            <li class="list-group-item" <?php if ($k + 1 === (int) date('N')) : ?> style="color:green;" <?php endif; ?>>
                <strong> <?= $jour ?></strong>
                <?= creneaux_html(CRENEAUX[$k]); ?>
            </li>



        <?php endforeach; ?>





    </div>
</div>


<?php require 'footer.php'; ?>