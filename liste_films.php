<h1>Liste des films</h1>
<table>
    <thead>
    <th>TITRE</th>
    <th>ACTION</th>
    </thead>
<?php 
    foreach ($films as $film) {
?>
    <tr>
        <td><?php echo $film; ?></td>
        <td><a><button>Supprimer</button></a></td>
    </tr>
<?php
    }
?>
</table>