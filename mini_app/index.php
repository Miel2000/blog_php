<?php

 $title = "Page d'acceuille";
 $nav = "index";




 require "header.php";


 
 
?>
<pre>
<?php  print_r($_SERVER); ?>
</pre>
  <div class="starter-template">
    <h1> <?php echo $title ;?> </h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
  </div>

<?php require "footer.php"; ?>