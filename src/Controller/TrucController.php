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


        }

        public function addsite(){

            if ($this->request->is('post')) {

                $a = $this->request->data;
                $query = $this->loadModel("Sites")->query();
                $query->insert(['name', 'type','location_x','location_y'])->values(['name' => $a['name'],'type' => $a['type'],'location_x' => $a['location_x'], 'location_y' => $a['location_y']])->execute();

                $this->redirect(array('action' => 'listesite'));
            }
        }
public function updatesite(){



	if ($this->request->is("post"))
	{
		if( $this->request->data['location_x']!=NULL && $this->request->data['location_y']!=NULL){
			$updateSite->location_x = $this->request->data['location_x'];
		$updateSite->location_y = $this->request->data['location_y'];


		$this->Flash->set('Corrected successfully !');
		}else{
			$this->Flash->error('Dont forget to fill all the information');

		}

	}}

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
