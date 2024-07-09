<?php
if ($db = mysqli_connect('localhost', 'root', 'root', 'watch_data')) {
    // echo 'Connexion established';
} else {
    echo 'Connexion issue';
}
mysqli_set_charset($db, "utf8");
