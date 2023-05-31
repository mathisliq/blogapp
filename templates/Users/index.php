<h1>Tous les utilisateurs du Blog</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>  
        <th>Pr&eacute;nom</th> 
        <th>Age</th> 
        <th>email</th> 
        <th>Usermane</th>
        <th>Nb Articles</th>
        <th>Date de cr&eacute;ation</th>
        <th>Date de modification</th>
        <th>Actions</th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesUsers, l'affichage des infos des users -->
    <?php foreach ($mesUsers as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->lastname ?></td>
            <td><?= $user->name ?></td>
            <td><?= $user->age ?></td>
            <td><?= $user->email ?></td>
            <td>
                <?=
                $this->html->link($user->username, [
                    'controller' => 'users',
                    'action' => 'detail',
                    $user->id]);
                //l’url généré sera de la forme /articles/detail/1 ou /articles/detail/25…
                ?>
            </td>
            <td><?= count($user->articles) ?></td>
            <td><?= $user->created->format(DATE_RFC850) ?></td>
            <td><?= $user->modified->format(DATE_RFC850) ?></td>
            <td>
                <?=
                $this->html->link(__("Edit"), [
                    'controller' => 'users',
                    'action' => 'edit',
                    $user->id]);
                //l’url généré sera de la forme /users/edit/1 
                ?>

                <?=
                $this->Form->postLink(
                        __('Supprimer'),
                        ['action' => 'delete', $user->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ",
                                    $user->username, $user->id)])
                ?> 

            </td>
        </tr>
    <?php endforeach; ?>
</table>
<br /><!-- comment -->
<?=
$this->html->link(h("Ajouter un utilisateur"), [
    'controller' => 'users',
    'action' => 'add'
]);
?>

<?php unset($mesArticles); ?>