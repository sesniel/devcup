<?php

App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class AccountsController extends AppController {
    
    public $uses = array();

    public function emergency(){

        $this->layout = "frontend";           
        $this->loadModel('Heal'); 
        $check = $this->Heal->find('list', array('field' => 'name', 'order' => 'Heal.name'));
        $this->set('heals', $check);

        if ($this->request->is('post')):         
            $this->loadModel('TempUser');
            if($this->TempUser->save($this->request->data)):

                $Session_User['Account']['id'] = $this->TempUser->id;
                $Session_User['Account']['type'] = 0;
                $this->Session->write('Session_User', $Session_User);
                $this->redirect(array( 'action' => 'shoutout'));
                
            endif;
        endif;

    }

    public function shoutout(){
        
        $this->redirect('http://localhost/chat');
        
    }
    
    public function dashboard(){
        
        $this->layout = "frontend";  
        $this->admin_user();        
        $this->redirect('http://localhost/chat');
        
    }
    
    public function getinfo(){
        
        $this->layout = "frontend";  
        $account = $this->current_user();
        $this->loadModel('Conversation'); 
        $this->loadModel('Connection'); 
        if($this->data['info'] != "" && !isset($account['Account']['active'])):
            $dataConn['type'] = 0;
            $dataConn['user_id'] = $account['Account']['id'];
            $dataConn['status'] = 0;
            $this->Connection->create();
            $this->Connection->save($dataConn);
            $Session_User['Account']['id']      = $account['Account']['id'];
            $Session_User['Account']['type']    = $account['Account']['type'];
            $Session_User['Account']['connection_id']    = $this->Connection->id;
            $Session_User['Account']['active']  = 0;

            $this->Session->write('Session_User', $Session_User);
            $account = $this->current_user();
            
        endif;
        if($this->data['info'] != "" && isset($account['Account']['active'])):
            
            $data['type'] = 0;
            $data['connection_id'] = $account['Account']['connection_id'];
            $data['text'] = $this->data['info'];

            $this->Conversation->create();
            $this->Conversation->save($data);
        
        $active = $this->Connection->find('first', array('conditions' => array('Connection.id' => $account['Account']['connection_id']),  'order' => array('id' => 'desc')));
        
        echo '<div class="container-fluid" id="trackdown">';

           echo '<div class="row">';
               echo  '<div class="col-md-12">';

                    echo '<div class="widget ">';
                        echo '<div class="widget-head">';
                                echo '<i class="fa fa-lock"></i> Conversation History';
                        echo '</div>';

                        echo '<div class="widget-content">';
                            echo '<div class="padd">';
                                echo '<div id="contenthere"></div>';

                                    foreach($active['Conversation'] as $convo):

                                        if($convo['type'] == 0):
                                            echo "<div class='row'>";
                                            echo "<div class='col-lg-1'></div>";
                                            echo "<div class='col-lg-11'><p class='bg-info'>".$convo['text']."</p></div>";
                                            echo "</div>";
                                        else:
                                            echo "<div class='row'>";
                                            echo "<div class='col-lg-11'><p class='bg-danger'>".$convo['text']."</p></div>";
                                            echo "<div class='col-lg-1'></div>";
                                            echo "</div>";
                                        endif;
                                        
                                    endforeach;

                            echo '</div>';
                        echo '</div>';

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
            
        endif;
        
        
        exit;
        
    }
        
    public function fetchinfo(){
        
        $function = $this->data['function'];
    
        $log = array();

        switch($function) {

             case('getState'):
                     if(file_exists('chat.txt')){
                   $lines = file('chat.txt');
                     }
                 $log['state'] = count($lines); 
                     break;	

             case('update'):
                    $state = $this->data['state'];
                    if(file_exists('chat.txt')){
                       $lines = file('chat.txt');
                     }
                     $count =  count($lines);
                     if($state == $count){
                             $log['state'] = $state;
                             $log['text'] = false;

                             }
                             else{
                                     $text= array();
                                     $log['state'] = $state + count($lines) - $state;
                                     foreach ($lines as $line_num => $line)
                           {
                                               if($line_num >= $state){
                             $text[] =  $line = str_replace("\n", "", $line);
                                               }

                            }
                                     $log['text'] = $text; 
                             }

                 break;

             case('send'):
                      $nickname = htmlentities(strip_tags($this->data['nickname']));
                             $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                              $message = htmlentities(strip_tags($this->data['message']));
                     if(($message) != "\n"){

                             if(preg_match($reg_exUrl, $message, $url)) {
                            $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
                                    } 


    //fopen('chat.txt', 'a')
                     fwrite($this->site_url.'/app/webroot/chat.txt', "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n"); 
                     }
                     break;

        }

        echo json_encode($log);
        }
}
