<?php

App::uses('AppModel', 'Model');

class TempUser extends AppModel {

    public $useTable = 'temporary_users';
    public $validate = array(
        'email' => array(
            'rule'    => 'isUnique',
            'message' => 'This email already exists.'
        ) 
    );
    
}
