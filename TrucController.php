<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class TrucController extends AppController
    {
        public function machin(){

            $this->loadModel("Sites");
            $m=$this->Sites->find();
            $this->set("m",$m);

            $this->loadModel("Users");
            $new=$this->Users->newEntity(); // ajout d'un parametre si edition Users->get(1)
            if($this->request->is("post"))
            {
                $new->login = $this->request->data["login"];
                $new->passwd = $this->request->data["passwd"];
                $this->User->save($new);
            }
            $this->set("new", $new);
        }



        public function listesite(){


            $this->loadModel("Sites");
            $this->set('sites', $this->Sites->find());
            $this->loadModel("Records");
            $this->set('records', $this->Records->find());


        }

        public function accueil(){

        $this->loadModel('Users');
        $this->set('forgot', 0);
        if ($this->request->is('post')) {
            if (isset($this->request->getData()['Submit'])) {

                $user = $this->Players->login($this->request->getData()['pseudo'], $this->request->getData()['password']);
                if (empty($user) || $user == false) {
                    $this->Flash->error("Please complete all the information ");
                } else {
                    $this->request->session()->write('User', $user);
                    $this->request->session()->write('User', $user);


                    $this->redirect(['controller' => 'Truc', 'action' => 'listesite']);
                }
            }

        }
      }

        public function login(){
          $this->loadModel('Membre');
          if ($this->request->is('post')) {
          if (isset($this->request->getData()['Connexion'])) {
              $user = $this->request->getData()(['pseudo'],['password']);

              if (empty($user) || $user != $this->Membre) {
                  $this->Flash->error("Try again");
              } else {
                  $this->request->session()->write('User', $user);
                  $this->request->session()->write('User', $user);
                  // Creation de l'event login
                  //$this->createevent($this->request->session()->read('User'));

                  $this->redirect(['controller' => 'Truc', 'action' => 'accueil']);
              }

        }


    }
  }
      public function register(){
        $this->loadModel('Membre');

        if ($this->request->is('post')) {
        if (isset($this->request->getData()['Inscription'])) {
          $user1 = $this->request->getData()['pseudo'];
          $var1 = $this->Membre->find("all", array("conditions"=>array("Membre.pseudo"=>$user1)))->toArray();
          $user2 = $this->request->getData()['mail'];
          $var2 = $this->Membre->find("all", array("conditions"=>array("Membre.mail"=>$user2)))->toArray();
          $user3 = $this->request->getData()['password'];
          $user4 = $this->request->getData()['password2'];

          if (!empty($user1) AND !empty($user2) AND !empty($user3) AND !empty($user4))
          {
          if (sizeof($var1) == 0)
          {
            if (sizeof($var2) == 0)
            {
          if ($this->request->getData()['password'] == $this->request->getData()['password2'])
          {

          }
          else {
            $this->Flash->error("Your password are not similar");
          }
        }
        else {
          $this->Flash->error("This email is already used. Please choose another one");
        }
      }
        else {
          $this->Flash->error("This pseudo already exist. Please choose another one");
        }
        }
        $member = $this->Membre->newEntity();

              $member = $this->Membre->patchEntity($member, $this->request->getData());
              if ($this->Membre->save($member)) {
                  //$this->Flash->success(__("L'utilisateur a été sauvegardé."));

              }
              //$this->Flash->error(__("Impossible d'ajouter l'utilisateur."))
          $this->set('member', $member);
      }
      }
    }

        public function voieacheminement(){

        }

        public function detail(){

        }

        public function logout(){
    
    }

    }
?>
