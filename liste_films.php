<h1>Liste des films</h1>
<?php if( isset($_SESSION["utilConnecte"]) ): ?>
    <a href="front_controller.php?action=ajoute_film"><button>Nouveau</button></a>
<?php endif; ?>
<table>
    <thead>
    <th>TITRE</th>
    <th>ACTION</th>
    </thead>
<?php 
    foreach ($films as $film) {
?>
    <tr>
        <td><?php echo $film["titre"]; ?></td>
        <td><a href="front_controller.php?action=supprime_film&id=<?php echo $film["id"]; ?>"><button>Supprimer</button></a></td>
    </tr>
<?php
    }
?>
</table>