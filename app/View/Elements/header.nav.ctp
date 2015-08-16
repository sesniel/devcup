
<div class="container">
<div class="row">
    <div class="col-md-6">
        <?php echo $this->Html->image('logo.png', array('alt' => 'Lockforce', 'height' => '105px', 'width' => '380px')); ?>
    </div>
    <div class="col-md-6">
        <?php

        // users that have user accounts
        echo $this->Html->link('login', 
                array(
                    'controller' => 'users',
                    'action' => 'login'),
                array('class' => 'pull-right')
                );
        ?>
    </div>
</div>
</div>