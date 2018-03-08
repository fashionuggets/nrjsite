 <div class="container clearfix">
            <?php 
            echo $this->Form->create();
            echo $this->Form->input("login");
            echo $this->Form->input("password");
            echo $this->Form->submit();
    
            echo $this->Form->end();
    
        ?>

        </div>