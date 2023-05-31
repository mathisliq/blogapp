<?php

namespace App\Controller;

class CommentsController extends AppController {

    public function add() {
        $leNewComment = $this->Comments->newEmptyEntity();
        $this->loadModel('Articles');
        // Dans un controller ou dans une méthode de table.
        $lesArticles = $this->Articles->find('list', [
            'keyField' => 'id',
            'valueField' => 'title'
        ]);
        $lesArticles = $lesArticles->toArray();
        if ($this->request->is('post')) {
            $leNewComment = $this->Comments->patchEntity($leNewComment, $this->request->getData());
            if ($this->Comments->save($leNewComment)) {
                $this->Flash->success(__("Le commantaire a été sauvegardé."));
                return $this->redirect(['controller' => 'articles', 'action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter votre commentaire."));
            }
        }
        $this->set(compact('leNewComment', 'lesArticles'));
    }

    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $leComment = $this->Comments->get($id);
            if ($this->Comments->delete($leComment)) {
                $this->Flash->success(__("Le commentaire {0} d' id {1} a bien été supprimé ! ",
                                $leComment->title, $leComment->id));
                return $this->redirect(['controller'=>'articles', 'action' => 'detail', $leComment ->article_id]);
            }
        } catch (\Exception $ex) {
            $this->Flash->error(__("Vous ne pouvez pas faire cette action"));
            return $this->redirect(['controller'=>'articles', 'action' => 'detail', $leComment ->article_id]);
        }
    }

}
