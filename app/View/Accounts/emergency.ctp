
<div class="container">

    <div class="row">
        <div class="col-md-12">
                <!-- Widget starts -->
            <div class="widget ">
                <div class="widget-head">
                        <i class="fa fa-lock"></i> Basic Information
                </div>

                <div class="widget-content">
                    <div class="padd">

                        <?php


                            echo $this->Form->create('TempUser', array(
                                    'inputDefaults' => array(
                                    'div' => array('class' => 'form-group')
                                    ),
                                    'class' => 'form-horizontal'
                            )), "\n\t";

                            echo $this->Form->input('first_name', array(
                                    'label'   => array(
                                        'class' => 'control-label col-lg-2'
                                    ),
                                    'between'      => '<div class="col-lg-9">',
                                    'after'        => '</div>',
                                    'class'        => 'form-control',
                                    'placeholder'  => 'First Name',
                                    'required'     => 'required',
                                    'autocomplete' => 'off'
                            )), "\n";

                            echo $this->Form->input('last_name', array(
                                    'label'   => array(
                                        'class' => 'control-label col-lg-2'
                                    ),
                                    'between'      => '<div class="col-lg-9">',
                                    'after'        => '</div>',
                                    'class'        => 'form-control',
                                    'placeholder'  => 'Last Name',
                                    'required'     => 'required',
                                    'autocomplete' => 'off'
                            )), "\n";

                            echo $this->Form->input('email', array(
                                    'label'   => array(
                                        'class' => 'control-label col-lg-2'
                                    ),
                                    'between'      => '<div class="col-lg-9">',
                                    'after'        => '</div>',
                                    'class'        => 'form-control',
                                    'required'     => 'required',
                                    'placeholder'  => 'email',
                                    'autocomplete' => 'off'
                            )), "\n";

                            echo '<div class="form-group"><label for="UserEmail" class="control-label col-lg-2">Select Type</label><div class="col-lg-9">';

                            echo $this->Form->select(
                                'heal', // First param = fieldName
                                $heals, // Second param = options
                                array(
                                    'class'        => 'form-control',
                                    'required'     => 'required',
                                ) // Third param = attributes
                            ); 

                            echo '</div></div>';

                            echo "<div class='row'><div class='col-lg-12'>";
                            echo $this->Form->submit('Help Me', array('class' => 'btn btn-primary pull-right move-me-few'));
                            echo '</div></div>';

                            echo $this->Form->end();
                        ?>
                    </div>
                </div>

            </div>
         </div>
     </div>
 </div>
