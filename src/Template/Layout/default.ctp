<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>

            <?= $this->Html->css('base.css') ?>
                <?= $this->Html->css('cake.css') ?>

                    <?= $this->fetch('meta') ?>
                        <?= $this->fetch('css') ?>
                            <?= $this->fetch('script') ?>
</head>

<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="left">



   <li>       <?php echo $this->HTML->link("Home",["controller"=>"truc", "action" =>"accueil"]);?></li>
     <li>       <?php echo $this->HTML->link("Login",["controller"=>"truc", "action" =>"login"]);?></li>
     <li>   <?php echo $this->HTML->link("Sites",["controller"=>"truc", "action" =>"listesite"]);?></li>


   <li>       <?php echo $this->HTML->link("Details",["controller"=>"truc", "action" =>"detail"]);?></li>
   <li>       <?php echo $this->HTML->link("Routing Way",["controller"=>"truc", "action" =>"voieacheminement"]);?></li>



            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
        <div class="container clearfix">

            <?= $this->fetch('content') ?>
        </div>
        <footer>
            <!--mettre nom prénom et options pour la correction -->
            Vincent Briatte - Philippe de Néverlée - Laura Es Chasseriau - Alexis Laporte-Fauret Gr1 EN
            <?php echo $this->HTML->link("clickme",["controller"=>"truc", "action" =>"machin"]);?>
        </footer>
</body>

</html>
