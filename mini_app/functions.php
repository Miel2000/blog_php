
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
      nav_item('/contact.php', 'Contact', $linkClass);
};


?>
