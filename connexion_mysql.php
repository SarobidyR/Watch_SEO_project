<?php
    if($bdd = mysqli_connect('localhost', 'root', 'root', 'watch_data'))
    {
        // echo 'Connexion established';
    }
    else
    {
        echo 'Connexion issue';
    }
    mysqli_set_charset($bdd, "utf8");

?>