<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<span class=" btn">
<?php
$a = true;
$erreur = "You have been deconnected";
echo $this->HTML->link("Return to home Page",["controller"=>"truc", "action" =>"accueil"]);
?>
</span>
