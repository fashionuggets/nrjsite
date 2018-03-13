<!DOCTYPE html>

<?php
session_start();
$bdd = new PDO ('mysql:host=127.0.0.1;dbname=ece_nrj','root','root');
$a = true;

if(isset($_POST['Connexion']))
{
$pseudoconnexion = htmlspecialchars($_POST['pseudoconnexion']);
$passwordconnexion = sha1($_POST['passwordconnexion']);
  if (!empty($_POST['pseudoconnexion']) and !empty($_POST['passwordconnexion']))
  {
 $requser = $bdd->prepare ("SELECT * FROM Membre WHERE pseudo=? AND password = ?");
 $requser->execute(array($pseudoconnexion,$passwordconnexion));
 $userconnexion = $requser->rowCount(); /// compare les infos userconnexion avec user dans BDD

 if ($userconnexion == 1) /// si l'utilisateur est connu
 {
   $a = false ;
   $userinfo = $requser->fetch(); /// récupère les informations
   $_SESSION['id'] = $userinfo['id'];
   $_SESSION['pseudo'] = $userinfo['pseudo'];
   $_SESSION['mail'] = $userinfo['mail'];

   echo 'Welcome '.$_SESSION['pseudo'].' in our website';

 }
 else {
   $erreur = "Wrong pseudo or password";
 }
  }
  else {
    $erreur = "All the following information have to be completed !";
  }

}

?>

<html lang="en">
    <head>
        <!-- En-tête de la page -->
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./style.css" />
        <link href="bootstrap.css" rel="stylesheet">
    </head>

    <body>

        <header>
          <div class="col-md-2 col-md-offset-5">
            <h1> <strong>ECORP</strong></h1>
          </div>

          <div class = "container logincontainer">
              <div class="wrapper">
                  <div class="top-bar-section">
                      <span class="right btn">
                        <?php
                        if ($a == true)
                        {
                          echo $this->HTML->link("Sign Up",["controller"=>"truc", "action" =>"login"]);
                       }
                       else {
                        echo $this->HTML->link("Logout",["controller"=>"truc", "action" =>"logout"]);
                       }
                      ?>
                      </span>
                  </div>
    </header>
    <div>
        <?  echo $this->Html->image('ecorp.png', array('width'=>'500px','height'=>'200px'));?>
    </div>

<div class="container clearfix">
  <fieldset>
      <legend><?= __('Welcome Back. Please Sign In') ?></legend>
           <?
           echo $this->Form->create();
           echo $this->Form->control("pseudo",['name'=> 'pseudoconnexion']);
           echo $this->Form->control("password",['name'=> 'passwordconnexion']);
       ?>
       <?= $this->Form->button(__('Connexion'),['name'=> 'Connexion']);
       $this->Form->end()
       ?>
    </fieldset>
  </div>

  <div class="p-3 mb-2 bg-light text-dark">
        <h2> Our Company </h2>
              <ul >
                          <li ><h3>Address : </h3> 98 rue Jean de la Fontaine, 75016, Paris, France</li>
                          <li ><h3>Cell number :</h3> +33 6 29 85 74 51</li>
                          <li ><h3>Email : </h3>Ecorp@gmail.com</li>
                          <li ><h3>Year of creation :</h3> 2007</li>
              </ul>


  <hr>






          <section id="experience">


                <h2>Our Team</h2>
          <h4><strong>Es chasseriau Laura|</strong> CEO</h4>
              <p class="image"> <img src="images/BL.jpg" alt="BL" >




                  <h5>Her missions :</h5>
  <ul >

                          <li>Conception theorical and technical</li>
                          <li>Medelisation</li>
                          <li>Realisation </li>
                      </ul>






                   <h4><strong>Briatte Vincent | </strong>IT Director</h4>
           <p class="image"> <img src="images/GGA.png" alt="GGA" >

  <h5>His missions :</h5>

              <ul >

                          <li>Information classification</li>
                          <li>Life insurance advice</li>
                          <li>Promotion</li>
                      </ul>



              <h4><strong>De Neverlée Philippe |</strong>  Financial Director</h4>
           <p class="image"> <img src="images/egis.png" alt="Egis" >

      <h5>His missions :</h5>
                <ul>

                          <li>Opening a building branch in Egis Cameroun for January 2017</li>
                          <li>Coordination and setting up an operational team </li>


                      </ul>



                  <h4><strong>Laporte Fauret |</strong> Marketing Director</h4>
               <p class="image"> <img src="images/CEAA.png" alt="cea" >

               <h5>His missions :</h5>

               <ul >

                          <li>Reporting experimentation</li>
                          <li>Working with technical team </li>
                    <li>Coordination engineering and technical team </li>

                      </ul>


               </div>
   <hr>

</html>
<?php
if(isset($erreur))
{
  echo '<font color="red">'.$erreur."</font>";
}
?>
