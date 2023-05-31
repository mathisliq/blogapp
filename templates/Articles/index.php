<h1>Tous les articles du Blog</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Titre</th>        
        <th>Date de cr&eacute;ation</th>
        <th>Date de modification</th>
        <th>Cr&eacute;&eacute; par</th>
        <th>Nb commentaires</th>
        <th>Actions</th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
    <?php foreach ($mesArticles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td>
                <?=
                $this->html->link($article->title, [
                    'controller' => 'articles',
                    'action' => 'detail',
                    $article->id]);
                //l’url généré sera de la forme /articles/detail/1 ou /articles/detail/25…
                ?>
            </td>
            <td><?= $article->created->format(DATE_RFC850) ?></td>
            <td><?= $article->modified->format(DATE_RFC850) ?></td>
            <td>
                    <?= $this->html->link(__($article->user->username), [
                    'controller' => 'users',
                    'action' => 'detail',
                    $article->user_id]);
                //l’url généré sera de la forme /articles/edit/1 ou /articles/edit/25…
                ?>          
            </td>
            <td><?= count($article->comments) ?></td>
            <td>
                <?=
                $this->html->link(__("Edit"), [
                    'controller' => 'articles',
                    'action' => 'edit',
                    $article->id]);
                //l’url généré sera de la forme /articles/edit/1 ou /articles/edit/25…
                ?>

                <?=
                $this->Form->postLink(
                        __('Supprimer'),
                        ['action' => 'delete', $article->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", 
                                $article->title, $article->id)])
                ?> 

            </td>
        </tr>
<?php endforeach; ?>
</table>
<br /><!-- comment -->
<?=
$this->html->link(h("Ajouter un article"), [
    'controller' => 'articles',
    'action' => 'add'
]);
?>

<?php unset($mesArticles); ?>