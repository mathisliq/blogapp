<h2>Bienvenue <?= h($leUser->lastname) ?> <?= h($leUser->name) ?></h2>
<p>
    <small>Created : <?= $leUser->created->format(DATE_RFC850) ?></small>
    <br />
    <small>Modified : <?= $leUser->created->format(DATE_RFC850) ?></small>
</p>

<br />
<br />
<p> Age : <?= $leUser->age ?></p>
<p> Email : <?= $leUser->email ?></p>
<p> Username : <?= $leUser->username ?></p>
<p> password : <?= $leUser->password ?></p>
<br />
<br />
<?=
$this->html->link(h("Retour à la liste des users"), [
    'controller' => 'users',
    'action' => 'index'
    ]);
?>

<?php unset($leUser); ?>.

