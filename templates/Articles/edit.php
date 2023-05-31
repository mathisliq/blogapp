<h1>Modifier l'article <?= $leArticle->title ?></h1>
<?php
echo $this->Form->create($leArticle);
echo $this->Form->control('title', ['label' => 'Le titre de l\'article']);
echo $this->Form->control('content', 
        ['rows' => '3',
         'label' => 'Le contenu de l\'article']);
echo $this->Form->control('user_id', ['options'=> $lesUsers, 'label' => 'Selectionnez un user']);
echo $this->Form->button(__("Modifier l'article"));
echo $this->Form->end();
?>
<br />
<?=
$this->html->link(h("Retour à la liste des articles"), [
    'controller' => 'articles',
    'action' => 'index'
]);
?>

