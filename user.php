<?php
require_once "bootstrap.php";

$korisnik = $user->getUserWithId($_SESSION['loggedUser']->id);

$postovi_korisnika = $post->selectById($_SESSION['loggedUser']->id);

require_once "views/user.view.php";

?>