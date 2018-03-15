<!DOCTYPE html>

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
  
