
<table>

    <?php $this->assign("title", "Formulaire");
    foreach($m as $site) //represente un site
{echo "<tr>";
 echo"<td>".$site->name."</td>";
 echo"<td>".$site->type."</td>";
echo "</tr>";

 echo $this->Form->create($new); //prerempli les imputs de la base de données
 echo $this->Form->import("login");
 echo $this->Form->import("password");
 echo $this->Form->submit();
 echo $this->Form->end();

 echo $this->Form->create();

}

?>

</table>


<section class="large-6">
    <h2>Formulaire</h2>
    <?= $this->Form->create()?>
        <?= $this->Form->input('name')?>
            <?= $this->Form->input('type')?>
                <?= $this->Form->input('location_x')?>
                    <?= $this->Form->input('location_y')?>
                        <?= $this->Form->input('stock')?>
                            <?= $this->Form->submit()?>
                                <?= $this->Form->end()?>
</section>
