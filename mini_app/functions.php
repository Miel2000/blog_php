
<?php
// afin d'éviter les problemes de duplication de function lors d'un require, on peut décloisoner notre code dans menu_function, et l'injecter ici avec require_once 
// ou tout simplement venir vérifier avec la function crée grâce à la methode function_exists, si elle n'existe pas, alors elle est crée une fois, à la deuxieme lecture, la condition sera sauté car la function nav_item sera crée et repéré.


function nav_item(string $lien, string $titre, string $linkClass): string 
{

    $classe = 'nav-item';
    if($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = $classe . ' active';
    }


    return  '<li class="'. $classe .'">
                <a class="'.$linkClass.'" href="'.$lien.'"> '.$titre.' </a>
            </li>';

}


function nav_menu(string $linkClass = ''): string 
{
    return
      nav_item('/index.php', 'Acceuil', $linkClass) .
      nav_item('/contact.php', 'Contact', $linkClass) .
      nav_item('/glace.php', 'Glace', $linkClass);
};


function checkbox (string $name, string $value, array $data):string 
{
    $attributes  = '';
    if(isset($data[$name]) && in_array($value, $data[$name])){
         $attributes .= 'checked';
    }

    return <<<HTML
    <input type='checkbox' name="{$name}[]" value="$value" $attributes>
HTML;
}

function radiobox(string $name, string $value, array $data)
{
        $attributes  = '';
    if(isset($data[$name]) && in_array($value, $data[$name])){
         $attributes .= 'checked';
    }

    return <<<HTML
    <input type='radio' name="{$name}[]" value="$value" $attributes>
HTML;
}


function select(string $name, $value, array $options )
{
    $html_options = [];
    foreach($options as $k => $option){
        $attributes = $k == $value ? 'selected' : '';
        $html_options[]= "<option value='$k' $attributes >$option</option>";
    }
    return "<selected class='form-control' name='$name'>" . implode($html_options);
}

function dump($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}

function creneaux_html(array $creneaux)
{
   
    $phrases = [];
    foreach($creneaux as $creneau){
        
        if (empty($creneau)) {
            return ' <span style="color:red;">Fermé</span>';
        }

        $phrases[] = "de <strong> {$creneau[0]} h</strong> à <strong> {$creneau[1]} h</strong>";
    }
 

    return 'Ouvert de '. implode(' et ', $phrases) ;
 
}    

function in_creneaux(int $jour ,int $heure, array $creneaux)
{

    if($jour > 4) {
        return false;
    }

    foreach ($creneaux as $creneau) 
    {
      

        $debut = $creneau[0];
        $fin = $creneau[1];

     if($heure >= $debut && $heure < $fin){
             return true;
             } 
    }
    return false;   
        
 }


     
    

  
 
 // va vérifier si l'heure est dans le tableau creneaux;





?>
