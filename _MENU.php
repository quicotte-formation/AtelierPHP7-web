<div class="menu">
    <a href="front_controller.php?action=liste_films">Films</a>
    <a href="front_controller.php?action=liste_series">Séries</a>
    <?php if( isset($_SESSION["utilConnecte"])): ?>
        <a href="front_controller.php?action=logout">Déconnexion</a>
    <?php else: ?>
        <a href="front_controller.php?action=login">Login</a>
    <?php endif; ?>
</div>