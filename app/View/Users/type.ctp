<div class="row">
    <div class="col-md-12 center-block" style="max-width:100%">
        <?php
            //reroute for someone who need help
            echo $this->Html->link('Everything will be okay.', 
                    array(
                        'controller' => 'accounts',
                        'action' => 'emergency'),
                         array(
                            'class' => array('btn', 'orange')
                        )
                    );

        ?>
    </div>
</div>
