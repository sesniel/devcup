
<!-- Form area -->
<div class="admin-form">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                    <!-- Widget starts -->
                <div class="widget ">
                    <div class="widget-head">
                            <i class="fa fa-lock"></i> Login
                    </div>

                    <div class="widget-content">
                        <div class="padd">
                                <!-- Login form -->
                                <?php
                                echo $this->Session->flash('auth');
                                echo $this->Session->flash();

                                echo $this->Form->create('User', array(
                                        'inputDefaults' => array(
                                        'div' => array('class' => 'form-group')
                                        ),
                                        'class' => 'form-horizontal'
                                )), "\n\t\t\t\t\t\t\t\t";

                                echo $this->Form->input('username', array(
                                        'label'   => array(
                                                'class' => 'control-label col-lg-3'
                                        ),
                                        'between'      => '<div class="col-lg-9">',
                                        'after'        => '</div>',
                                        'class'        => 'form-control',
                                        'placeholder'  => 'Username',
                                        'autocomplete' => 'off'
                                        ,'default'      => @$_COOKIE['username']
                                )), "\n";

                                echo $this->Form->input('password', array(
                                        'label'   => array(
                                                'class' => 'control-label col-lg-3'
                                        ),
                                        'between'      => '<div class="col-lg-9">',
                                        'after'        => '</div>',
                                        'class'        => 'form-control',
                                        'placeholder'  => 'Password',
                                        'autocomplete' => 'off'
                                        ,'default'      => @$_COOKIE['password']
                                )), "\n";
                                ?>

                                <div class="col-lg-9 col-lg-offset-3 pull-right">
                                        <button type="submit" class="btn btn-info btn-sm" id="submit">Sign in</button>
                                </div>
                                <br />
                                <?php
                                echo $this->Form->end();
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
