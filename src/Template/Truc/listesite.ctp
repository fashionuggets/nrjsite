<h1> Liste des sites</h1>




<table border="1">
	<tr>
		<th>Id site</th>
		<th>name</th>
		<th>Position: longitude</th>
		<th>Position: Latitude</th>



	</tr>
	<?php foreach($sites as $p) {?>
		<tr>

			<td><?php echo $this->Html->link($p['id'],array('controller' => 'truc', 'action' => 'detail', $p['id']));?></td>
			<td><?php echo $p ['name'];?></td>
			<td><?php echo $p ['location_x'];?></td>
			<td><?php echo $p ['location_y'];?></td>






		</tr>
	<?php } ?>

	</table>



        <li><?php echo $this->Html->link('Add a site', array('controller' => 'truc', 'action'=> 'addsite')); ?></li>



