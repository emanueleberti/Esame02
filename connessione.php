<?php

    // Connessione al database
    $servername = "89.46.111.215";
    $username = "Sql1783286";
    $password = "LoreManu19992002!";      
    $dbname = "Sql1783286_1";

    // Creazione della connessione
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controllo della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

?>