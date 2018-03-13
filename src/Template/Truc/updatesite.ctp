

     <script>
                function displayForm(bouton, id)
{
  var div = document.getElementById(id);

  if(div.style.display === "none")
  {
    div.style.display = "inline";
    bouton.innerHTML = "Cacher";
  }
  else
  { // S'il est visible...
    div.style.display = "none";
    bouton.innerHTML = "Editer les informations";
  }
}
        </script>


         <button type="button" onclick="displayForm(this,'start');">Editer les informations</button>
                        <div id="start" style="display:none;">
                        <table>
                            <tr>
                            <?php echo $this->Form->create();?>
                            <td></td>
                          <td><?php echo $this->Form->input('location_x', ['label' => 'Location X']);?></td>
                            <td><?php echo $this->Form->input('location_y', ['label' => 'Location Y']);?></td>
                            <td><?php echo $this->Form->button('Add');?></td>
                            <?php echo $this->Form->end();?>
                        </tr>
                        </table>
                        </div>

