<?php 

require 'header.php'  ;
require_once 'functions.php'  ;


/******** */


//checkbox
$parfums = [
        'Fraise' => 4,
        'Vanille' => 2,
        'Chocolat' => 5
];

//radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];

//checkbox
$supplements = [
    'Pepite de chocolat' => 1,
    'Chantilly' => 5
];

$ingredients = [];
$total = 0;


    if(isset($_GET['parfum']))
    {
        foreach($_GET['parfum'] as $parfum){
            if(isset($parfums[$parfum])){
                $ingredients[] = $parfum;
                $total += $parfums[$parfum];
            }
            
         };
       
    }

    if(isset($_GET['cornet']))
    {
       foreach($_GET['cornet'] as $cornet){
              if(isset($cornets[$cornet])){
                $ingredients[] = $cornet;
                $total += $cornets[$cornet];
            }
         };
      
    }

    if(isset($_GET['supplement']))
    {
        foreach($_GET['supplement'] as $supplement){
             if(isset($supplements[$supplement])){
                $ingredients[] = $supplement;
                $total += $supplements[$supplement];
            }
         };
        
    }


/******** */
?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                     <h5>Votre glace</h2>
                     <?php if(isset($ingredients)) {
                          
                         foreach($ingredients as $ingredient ){
                             echo $ingredient .  '  '. '<br>';
                         }
                         echo "<strong> Total</strong> : " . $total . "€";
                     }
                     ?>
                </div>
            </div>
         </div>
    </div>
    <div class="col-md-8">
        <h1>Composer votre glace</h1>
        <form action="/glace.php" method="GET">

        <h3>Parfum</h3>
        <div class="form-group">
            <?php 
                foreach($parfums as $parfum => $prix) {
                    echo  checkbox('parfum', $parfum, $_GET) . ' ';
                    echo   $parfum . " - " . $prix. "€<br>";
            }
            ?>
        </div>
        <h3>Contenant</h3>
        <div class="form-group">
            <?php 
                foreach($cornets as $cornet => $prix) {
                echo radiobox('cornet', $cornet, $_GET);
                echo  $cornet ." - ". $prix ."€<br>";
                }
            ?>

        </div>
        <h3>Supplément</h3>
        <div class="form-group">
        <?php 
                foreach($supplements as $supplement => $prix) {
                echo  checkbox('supplement', $supplement, $_GET) . ' ';
                echo  $supplement  . " - " . $prix  . "€<br>";
                }
            ?>

        </div>

        <input type="submit" class="btn btn-primary" value="Faire ma glace !">
        </form>
    </div>
</div>

<pre>
    <h2>GET</h2>
    <br>
    <?php 

  // var_dump($_GET['parfum']);

     ?>
</pre>
<style>
h3 {
    opacity:0.7;
}
</style>


<?php require 'footer.php'; ?>
