<?php
include 'connessione.php'; // Connessione al database

$username = 'emanueleberti'; 
$password = 'LoreManu19992002'; 

// Crittografa la password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepara la dichiarazione SQL
if ($stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (?, ?)")) {
    $stmt->bind_param("ss", $username, $hashed_password);
    if ($stmt->execute()) {
        echo "Utente inserito con successo.";
    } else {
        echo "Errore durante l'inserimento dell'utente.";
    }
    $stmt->close();
} else {
    echo "Errore di connessione al database.";
}

$conn->close();
?>
