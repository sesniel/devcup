<?php

App::uses('AppModel', 'Model');

class Connection extends AppModel {
    
    public $useTable = 'connections';
    
    var $hasMany = array(
        'Conversation' => array(
                'className' => 'Conversation',
                'foreignKey' => 'connection_id',
                'dependent' => true,
                'fields' => array('id','text', 'type'),
                'order' => array('id' => 'desc'),
                'limit' => 50
        )
    );
        
}
