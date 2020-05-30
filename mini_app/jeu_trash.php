<?php 
 $aDeviner = 150;
 $erreur = null;
 $success = null;
 $value = null;

 if (isset($_GET['user_chiffre'])){

     if($_GET['user_chiffre'] > $aDeviner ) {
          $erreur = "votre chiffre est trop grand";
     } elseif ($_GET['user_chiffre'] < $aDeviner) {
          $erreur = "votre chiffre est trop petit";
     } elseif($_GET['user_chiffre'] === '150') {
          $success = "success";
     }

     $value = (int) $_GET['user_chiffre'];
 }

if(isset($_GET['user_chiffre'])){
    $input = $_GET['user_chiffre'];
}

?>

<p>coucou</p> 

<h3>en GET</h1>
<p>Devinez le chiffre 150</p>
<?php
    if($erreur):
?>
<div class="alert alert-danger">
        <?= $erreur ?>
</div>
<?php elseif ($success): ?>
<div class="alert alert-success">
        <?= "Yiinnngo !" ?>
</div>
<?php endif ?>

<form action="jeu.php" method="GET">
    <input type="number" name="user_chiffre" placeholder="<?php echo $value?>">
    <input type="text" name="user_demo" >
    <input type="submit" value="Ok">
</form>

<?php 
if(isset($input)){
    if($input === "150") { echo "Yingo!" ;} else { echo $erreur;};
}
?>