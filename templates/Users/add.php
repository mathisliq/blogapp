<h1>Ajouter un utilisateur</h1>
<?php
echo $this->Form->create($leNewUser);
echo $this->Form->control('lastname', ['label' => 'Saisissez votre nom']);
echo $this->Form->control('name', ['label' => 'Saisissez votre prénom']);
echo $this->Form->control('age', ['label' => 'Saisissez votre age']);
echo $this->Form->control('email', ['label' => 'Saisissez votre email']);
echo $this->Form->control('username', ['label' => 'Saisissez votre username']);
echo $this->Form->control('password', ['label' => 'Saisissez votre mot de passe']);
echo $this->Form->button(__("Sauvegarder l'utilisateur"));
echo $this->Form->end();
?>
<br />
<?=
$this->html->link(h("Retour à la liste des utilisateurs"), [
    'controller' => 'users',
    'action' => 'index'
]);
?>

