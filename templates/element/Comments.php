<h1>Ajouter un Comme</h1>
<?php
echo $this->Form->create($leNewComment);
echo $this->Form->control('title', ['label' => 'Le titre du commentaire']);
echo $this->Form->control('content', 
        ['rows' => '3',
         'label' => 'Le contenu du commentaire']);
echo $this->Form->button(__("Sauvegarder l'article"));
echo $this->Form->end();
?>
<br />

