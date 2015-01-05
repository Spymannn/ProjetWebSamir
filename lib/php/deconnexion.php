<?php
session_start();
session_destroy();
header('Location: http://localhost/MovieShow/index.php?page=accueil');
?>


