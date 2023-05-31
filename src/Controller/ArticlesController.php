<?php

namespace App\Controller;

class ArticlesController extends AppController {

    public function index() {
        //on récupére tous les articles et on les stocke dans $mesArticles
        $mesArticles = $this->Articles->find('all')->contain([
                    'Users' => function ($q) {
                        return $q
                                ->select(['username', 'email']);
                    },
                    'Comments' => function ($q) {
                        return $q
                                ->select(['article_id']);
                    }])->all();

        $this->set(compact('mesArticles')); //envoie à la vue le contenu de $mesArticles dans $rep qui sera utiliseable
    }

    public function detail($id = null) {
        try {
            $leArticle = $this->Articles->get($id, [
                'contain' => ['Comments.Users' => function ($q) {
                        return $q
                                ->select(['username'])
                                ->order(['Comments.created asc']);
                    },
                    'Users' => function ($q) {
                        return $q
                                ->select(['username']);
                    },]]);
            $this->loadModel('Comments');
            $leNewComment = $this->Comments->newEmptyEntity();
            if ($this->request->is('post')) {
                $leNewComment = $this->Comments->patchEntity($leNewComment, $this->request->getData());
                $leNewComment->article_id = $leArticle->id;
                $leNewComment->user_id = $this->Auth->user('id');
                if ($this->Comments->save($leNewComment)) {
                    $this->Flash->success(__("Le commantaire a été sauvegardé."));
                    return $this->redirect(['controller' => 'articles', 'action' => 'index']);
                } else {
                    $this->Flash->error(__("Impossible d'ajouter votre commentaire."));
                }
            }
        } catch (\Exception $e) {
            if ($id == null) {
                $this->Flash->error(__("L'action detail doit être appelé avec un id"));
            } else {
                $this->Flash->error(__("Larticle {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('leArticle', 'leNewComment'));
    }

    public function add() {
        $leNewArticle = $this->Articles->newEmptyEntity();
        $this->loadModel('Users');
        // Dans un controller ou dans une méthode de table.
//        $lesUsers = $this->Users->find('list', [
//            'keyField' => 'id',
//            'valueField' => 'username'
//        ]);
//        $lesUsers = $lesUsers->toArray();
        if ($this->request->is('post')) {
            $leNewArticle = $this->Articles->patchEntity($leNewArticle, $this->request->getData());
            $leNewArticle->user_id= $this->Auth->user("id");
            if ($this->Articles->save($leNewArticle)) {
                $this->Flash->success(__("L'article a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter votre article."));
            }
        }
        $this->set(compact('leNewArticle'));
    }

    public function edit($id = null) {
        try {
            $leArticle = $this->Articles->get($id);
            $this->loadModel('Users');
            // Dans un controller ou dans une méthode de table.
            $lesUsers = $this->Users->find('list', [
                'keyField' => 'id',
                'valueField' => 'username'
            ]);
            $lesUsers = $lesUsers->toArray();
        } catch (\Exception $e) {
            if ($id == null) {
                $this->Flash->error(__("L'action edit doit être appelé avec un id"));
            } else {
                $this->Flash->error(__("L'article {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($leArticle, $this->request->getData());
            if ($this->Articles->save($leArticle)) {
                $this->Flash->success(__('Votre article a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            } else
                $this->Flash->error(__('Impossible de mettre à jour votre article.'));
        }
        $this->set(compact('leArticle', 'lesUsers'));
    }

    public function delete($id = null) {
        try {
            $this->request->allowMethod(['post', 'delete']);
            $leArticle = $this->Articles->get($id);
            if ($this->Articles->delete($leArticle)) {
                $this->Flash->success(__("L'article {0} d' id {1} a bien été supprimé ! ",
                                $leArticle->title, $leArticle->id));
                return $this->redirect(['action' => 'index']);
            }
        } catch (\Exception $ex) {
            $this->Flash->error(__("Vous ne pouvez pas faire cette action"));
            return $this->redirect(['action' => 'index']);
        }
    }

}
