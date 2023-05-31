<h1>Ajouter un article</h1>
<?php
echo $this->Form->create($leNewArticle);
echo $this->Form->control('title', ['label' => 'Le titre de l\'article']);
echo $this->Form->control('content', 
        ['rows' => '3',
         'label' => 'Le contenu de l\'article']);
echo $this->Form->button(__("Sauvegarder l'article"));
echo $this->Form->end();
?>
<br />
<?=
$this->html->link(h("Retour à la liste des articles"), [
    'controller' => 'articles',
    'action' => 'index'
]);
?>

