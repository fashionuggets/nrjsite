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

        public function addsite(){

            if ($this->request->is('post')) {

                $a = $this->request->data;
                $query = $this->loadModel("Sites")->query();
                $query->insert(['name', 'type','location_x','location_y'])->values(['name' => $a['name'],'type' => $a['type'],'location_x' => $a['location_x'], 'location_y' => $a['location_y']])->execute();
                $this->Flash->set('Vous avez bien ajouté un site');
                $this->redirect(array('action' => 'listesite'));
            }
        }


        public function login(){

        }

        public function accueil(){

        }

        public function voieacheminement(){

        }

        public function detail(){





        }

    }

    
?>
