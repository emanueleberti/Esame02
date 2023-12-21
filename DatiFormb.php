<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati dal form
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    // Crea una stringa con i dati formattati
    $dati_formattati = "Name: $name\nsurname: $surname\nphone: $phone\nemail: $email\n\n";

    // Specifica il percorso del file in cui salvare i dati
    $percorso_file = "Daticontattob.txt";

    // Apre o crea il file in modalità append
    $file = fopen($percorso_file, "a");

    // Scrive i dati nel file
    fwrite($file, $dati_formattati);

    // Chiude il file
    fclose($file);

    // Reindirizza l'utente a una pagina di conferma o grazie
    header("Location: conferma_invio.html");
    exit();
} 