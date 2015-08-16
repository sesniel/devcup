<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $uses = array();
        
        public function type(){
            
            $this->layout = 'login';
            
        }

        public function login(){
            
            $this->layout = 'login';
            $this->layout = 'login';

		if ($this->request->is('post')) {
			$someuser = $this->User->findByUsername($this->data['User']['username']);

			$rawPassword        =   $this->data['User']['password'];
			$encryptedPassword  =   sha1($rawPassword);
                        
			if (!empty($someuser['User']['password']) && $someuser['User']['password'] == $encryptedPassword) {
                            
				$Session_User['User']['id'] = $someuser['User']['id'];
				$Session_User['User']['email'] = $someuser['User']['email'];
				$Session_User['User']['full_name'] = $someuser['User']['name'];
				$Session_User['User']['type'] = $someuser['User']['type'];
				$this->Session->write('Admin_User', $Session_User);
				$this->redirect('/dashboard');
			}
			else{
				$this->Session->setFlash('Invalid Username or Password');
				$this->redirect('/');
			}
		}else{
			$this->Session->destroy();
		}
	}
}
