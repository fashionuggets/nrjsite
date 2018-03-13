<?php
$bdd = new PDO ('mysql:host=127.0.0.1;dbname=ece_nrj','root','root');

if (isset($_POST['Inscription']))
{
    $pseudo = htmlspecialchars($_POST['pseudo']); /// securise la variable
    $mail = htmlspecialchars($_POST['mail']);
    $password = sha1($_POST['password']); /// hachage du mdp pour plus de sécurité
    $password2 = sha1($_POST['password2']);
    if (!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['password']) and !empty($_POST['password2']))
    {
    $pseudolength = strlen($pseudo);
    if ($pseudolength <= 255) /// test la taille du pseudo
    {

        $reqmail = $bdd->prepare("SELECT * FROM Membre WHERE mail =?");
        $reqmail->execute(array($mail));
        $mailok = $reqmail->rowCount();

        if ($mailok == 0) /// tester si le mail existe déjà
        {

          $reqmail = $bdd->prepare("SELECT * FROM Membre WHERE pseudo =?");
          $reqmail->execute(array($pseudo));
          $pseudook = $reqmail->rowCount();

          if ($pseudook ==0) /// tester si le pseudo existe
          {
      if ($password == $password2)
      {
        $insertmbr = $bdd->prepare("INSERT INTO Membre(pseudo,mail,password) VALUES (?,?,?)");
        $insertmbr->execute(array($pseudo,$mail,$password));
        $erreur = "Your account have been created";
        header ("Location: accueil.ctp"); /// redirige l'utilisateur vers une nouvelle page
      }
      else {
        $erreur = "Please write twice the same password";
      }
    }
    else {
      $erreur = "Your pseudo already exists";
    }
  }
    else {
      $erreur = "Your mail already exists";
    }
    }
    else {
      $erreur = "Your pseudo must contain less than 255 character!";
    }
  }
  else
    {
      $erreur = "Please complete all the following information";
    }
  }

 ?>

 <?php
 if(isset($erreur))
 {
   echo '<font color="red">'.$erreur."</font>";
 }
 ?>

<div class="container clearfix">
  <fieldset>
      <legend><?= __('Join us') ?></legend>
           <?
           echo $this->Form->create();
           echo $this->Form->control("pseudo",['name'=> 'pseudo']);
           echo $this->Form->control("mail",['name'=> 'mail']);
           echo $this->Form->control("password",['name'=> 'password']);
           echo $this->Form->control("Confirm your password",['name'=> 'password2']);
       ?>

       <?= $this->Form->button(__('Ajouter'),['name'=> 'Inscription']);
       $this->Form->end()
       ?>
    </fieldset>
  </div>
