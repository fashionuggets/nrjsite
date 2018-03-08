<h1>Add a site</h1>

<?php
echo $this->Form->create('Sites');
echo $this->Form->input('name');
echo $this->Form->select('type',['producer'=>'Producer','consumer'=>'Consumer']);
echo $this->Form->input('location_x');
echo $this->Form->input('location_y');
echo $this->Form->button('Submit');
echo $this->Form->end();

echo $this->Html->link(
    'Annuler',
    array('controller' => 'truc', 'action' => 'listesite'),
        array('confirm' => 'Etes-vous sûr de voulour annuler?'));

?>ddddddd