<h1><?= h($leArticle->title) ?></h1>
<p><?= nl2br(h($leArticle->content)) ?></p>
<p>
    <small>Created : <?= $leArticle->created->format(DATE_RFC850) ?></small><br>
    <small>Posted : <?= $leArticle->user->username ?></small>
</p>
<?php
echo $this->Html->script('jquery360min');
?>

<script>
    $(document).ready(function () {
        $("#showcom").click(function () {
            if ($("#display").is(":visible") == false)
            {
                $("#display").show();
                $("#showcom").text("ne pas ajouter un commentaire");
            } else {
                $("#display").hide();
                $("#showcom").text("ajouter un commentaire");
            }
        });
    });

    
</script>
<script>
    $(document).ready(function () {
        $("#showcom1").click(function () {
            if ($("#display1").is(":visible") == false)
            {
                $("#display1").show();
                $("#showcom1").text("ne pas afficher les commentaires");
            } else {
                $("#display1").hide();
                $("#showcom1").text("afficher un commentaire");
            }
        });
    });
</script>


<?=
$this->Html->link(
        'Ajoutez un commentaire', '#', ['class' => 'button', 'id' => 'showcom']

);
?>
<?php
   if(count($leArticle->comments)){
        
    
echo $this->Html->link(
        'Afficher un commentaire', '#', ['class' => 'button', 'id' => 'showcom1']
);
    }
?>

<div id="display" style="display: none">
    <?= $this->element('comments'); ?>
</div>

<br><!-- comment -->

<div id="display1" style="display: none">



<h3>Les commentaires</h3>   
<?php foreach ($leArticle->comments as $comm): ?>
    <table border="1">
        <tr>
            <td><?= $comm->title ?></td>
        </tr>
        <tr>
            <td><?= nl2br(h($comm->content)) ?></td>
        </tr>
        <tr>
            <td>id : <?= $comm->id ?>
                Cr&eacute;&eacute; le : <?= $comm->created->format(DATE_RFC850) ?>
                Modifi&eacute; le : <?= $comm->created->format(DATE_RFC850) ?>
            par : <?= $comm->user->username ?>                
            </td>
        </tr>
        <tr>
            <td>
                <?=
                $this->Form->postLink(
                        __('Supprimer'),
                        ['controller' => 'comments', 'action' => 'delete', $comm->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ",
                                    $comm->title, $comm->id)])
                ?> 
            </td>
        </tr>
    </table>
<?php endforeach; ?>
</div>

<?=
$this->html->link(h("Retour à la liste des articles"), [
    'controller' => 'articles',
    'action' => 'index'
]);
?>

<?php unset($leArticle); ?>.

