<?php

    // Connessione al database
    $indirizzo = "localhost";
    $db = "esame03";
    $utente = "root";
    $password = "";

    // Creazione della connessione
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Controllo della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

?>