<?php

namespace App\Controller;

use Cake\Event\EventInterface;

class UsersController extends AppController {
    
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }


    public function index() {
        //on récupére tous les users et on les stocke dans $mesUsers
        $mesDepartements = $this->Departement->find('all')->contain([
        'Departements' => function ($q) {
            return $q
            ->select(['departement_id']);
        }])->all();
        $this->set(compact('mesDepartements')); //envoie à la vue le contenu de $mesArticles dans $rep qui sera utiliseable
    }


    public function add() {
        $leNewDepartement = $this->Departements->newEmptyEntity();
        if ($this->request->is('post')) {
            $leNewUser = $this->Users->patchEntity($leNewUser, $this->request->getData());
            if ($this->Users->save($leNewUser)) {
                $this->Flash->success(__("L'utilisateur a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter votre utilsiateur."));
            }
        }
        $this->set(compact('leNewUser'));
    }

}
