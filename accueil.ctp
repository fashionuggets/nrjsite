<!DOCTYPE html>

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
                         <?php echo $this->HTML->link("Sign Up",["controller"=>"truc", "action" =>"login"]);?>
                      </span>
                  </div>
    </header>
    <div>
        <?  echo $this->Html->image('ecorp.png', array('width'=>'500px','height'=>'200px'));?>
    </div>
    
    <div class="container clearfix">
       <fieldset>
           <legend> <?= __('Welcome back ! Please Sign In') ?> </legend>
           <?= $this->Form->input("login"); ?>
           <?= $this->Form->input("password"); ?>
           <?= $this->Form->button('Submit');?>
           <?= $this->Form->button('Forgotten Password'); ?>
       </fieldset>

</div>


<div class="p-3 mb-2 bg-light text-dark">
  .bg-light
      <h2> Our Company </h2>
            <ul >
                        <li ><h3>Adress : </h3> 98 rue Jean de la Fontaine, 75016, Paris, France</li>
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
