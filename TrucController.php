<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\Event\Event;

    class TrucController extends AppController
    {
        public function machin(){


        }



        public function listesite(){
          session_start();
          if (isset($_SESSION['id']))
          {
            $this->Flash->success("Welcome");
            $this->loadModel("Sites");
            $this->set('sites', $this->Sites->find());
            $this->loadModel("Records");
            $this->set('records', $this->Records->find());

          }
          else {
        $this->Flash->error("Please login first");
        $this->redirect(['action' => 'login']);

          }





        }

        public function accueil(){
          session_start();
          if (isset($_SESSION['id']))
          {
            $this->Flash->success("Welcome");
          }
          else {
        $this->redirect(['action' => 'login']);
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
            $member = $this->Membre->newEntity();

                  $member = $this->Membre->patchEntity($member, $this->request->getData());
                  if ($this->Membre->save($member)) {
                      $this->Flash->success("Your account have been created");

                  }
                  //$this->Flash->error(__("Impossible d'ajouter l'utilisateur."))
              $this->set('Membre', $member);
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
        else {
          $this->Flash->error("Please complete all the following information");
        }

      }
      }
    }


        public function voieacheminement(){
          session_start();
          if (isset($_SESSION['id']))
          {
            $this->Flash->success("Welcome");
          }
          else {
            $this->Flash->error("Please login first");
        $this->redirect(['action' => 'login']);
          }

        }

        public function detail(){
          session_start();
          if (isset($_SESSION['id']))
          {
            $this->Flash->success("Welcome");

          }
          else {
        $this->Flash->error("Please login first");
        $this->redirect(['action' => 'login']);

          }

        }

        public function logout(){
          session_start();
          session_destroy();

    }
        public function login()
        {
          $this->loadModel('Membre');
          if ($this->request->is('post'))
          {
          if(!empty($this->request->data(["pseudo"]))) {
            $this->loadModel('Membre');
            //loading player models
            //finding playerr and storing it in a variable
            $var = $this->Membre->find('all')->where(['pseudo'=>$this->request->data['pseudo']]);
            //check every users if the right one is used

            foreach ($var as $Membre)
            {
                if ($this->request->data['password'] == $Membre['password'])
                {
                  // writing on session variable connected account id
                  $this->request->session()->write('Membre.id',$Membre['id']);
                  $this->Flash->success('Vous êtes désormais connecté!');
                  $_SESSION['id'] = $Membre['id'];
                    //redirecting home
                    return $this->redirect(['action' => 'accueil']);
                    //return $this->redirect($this->Auth->redirectUrl());
                }

          }
          $this->Flash->error('Erreur mot de passe, veuillez réessayer !');
        }
      }
    }

  /*public function login()
    {
        if ($this->request->is('post')) {
            $member = $this->Auth->identify();
            if ($member) {
                $this->Auth->setUser($member);
                $this->Flash->error("You are connected");
                return $this->redirect($this->Auth->redirectUrl());
              }
                $this->Flash->error("Your pseudo or password is wrong ");

            }
        }*/




    }
