<?php

App::uses('AppModel', 'Model');

class User extends AppModel {

	//public $actsAs = array('Acl' => array('type' => 'requester'));
	public $virtualFields = array(
		'name' => 'CONCAT(User.first_name, " ", User.last_name)'
	);
        
}
