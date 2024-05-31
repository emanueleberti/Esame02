<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include 'connessione.php'; // Connessione al database

function handleTableUpdate($conn, $table) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update']) && $_POST['table'] == $table) {
        $ids = $_POST['id'] ?? [];
        $columns = array_filter(array_keys($_POST), fn($column) => $column !== 'update' && $column !== 'id' && $column !== 'table' && $column !== 'elimina');
        $values = [];

        foreach ($columns as $column) {
            $values[$column] = $_POST[$column];
        }

        foreach ($ids as $index => $id) {
            if (!empty($id)) {
                // Aggiorna record esistenti
                $setClause = implode(", ", array_map(fn($column) => "$column='" . $conn->real_escape_string($values[$column][$index]) . "'", $columns));
                $sql = "UPDATE $table SET $setClause WHERE id=$id";
            }

            if ($conn->query($sql) !== TRUE) {
                echo "Errore nell'aggiornamento del record: " . $conn->error;
            }
        }
    }
}

function handleTableAggiungi($conn, $table) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aggiungi']) && $_POST['table'] == $table) {
        $ids = $_POST['id'] ?? [];
        $columns = array_filter(array_keys($_POST), fn($column) => $column !== 'aggiungi' && $column !== 'id' && $column !== 'table' && $column !== 'elimina');
        $values = [];

        foreach ($columns as $column) {
            $values[$column] = $_POST[$column];
        }

        foreach ($ids as $index => $id) {
            if (!empty($id)) {
                // Aggiorna record esistenti
                $setClause = implode(", ", array_map(fn($column) => "$column='" . $conn->real_escape_string($values[$column][$index]) . "'", $columns));
                $sql = "UPDATE $table SET $setClause WHERE id=$id";
            } else {
                // Inserisci nuovi record
                $cols = implode(", ", $columns);
                $vals = implode(", ", array_map(fn($column) => "'" . $conn->real_escape_string($values[$column][$index]) . "'", $columns));
                $sql = "INSERT INTO $table ($cols) VALUES ($vals)";
            }
            if ($conn->query($sql) !== TRUE) {
                echo "Errore nell'aggiornamento del record: " . $conn->error;
            }
        }
    }
}

function handleTableElimina($conn, $table) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['elimina']) && $_POST['table'] == $table) {
        $id = $_POST['elimina'];
        $sql = "DELETE FROM $table WHERE id=$id";
        if ($conn->query($sql) !== TRUE) {
            echo "Errore nell'eliminazione del record: " . $conn->error;
        }
    }
}

// Gestisce l'aggiornamento/inserimento/eliminazione per ogni tabella
handleTableUpdate($conn, 'contatti');
handleTableUpdate($conn, 'competenze');
handleTableUpdate($conn, 'immagini');

handleTableAggiungi($conn, 'contatti');
handleTableAggiungi($conn, 'competenze');
handleTableAggiungi($conn, 'immagini');

handleTableElimina($conn, 'contatti');
handleTableElimina($conn, 'competenze');
handleTableElimina($conn, 'immagini');
?>



<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Riservata</title>
    <link rel="stylesheet" href="scssbackend.css">
</head>
<body>
    <h1>Benvenuto nell'area riservata, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p><a href="index.php">Logout</a></p>

    <?php
    function displayTable($conn, $table) {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='' method='POST'>";
            echo "<input type='hidden' name='table' value='$table'>";
            echo "<table>";
            echo "<tr>";
            // Intestazioni delle colonne
            while ($fieldInfo = $result->fetch_field()) {
                echo "<th>{$fieldInfo->name}</th>";
            }
            echo "<th>Modifica</th>";
            echo "<th>Elimina</th>";
            echo "</tr>";

            // Dati della tabella con campi di input per la modifica
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='hidden' name='id[]' value='{$row['id']}'>{$row['id']}</td>";
                foreach($row as $key => $value) {
                    if ($key !== 'id') {
                        echo "<td data-label='{$key}'><input type='text' name='{$key}[]' value='" . htmlspecialchars($value) . "'></td>";
                    }
                }
                echo "<td><button type='submit' name='update' value='update'>Aggiorna</button></td>";
                echo "<td><button type='submit' name='elimina' value='{$row['id']}'>Elimina</button></td>";
                echo "</tr>";
            }

            // Righe vuote per inserire nuovi record
            echo "<tr>";
            echo "<td><input type='hidden' name='id[]' value=''></td>";
            foreach ($result->fetch_fields() as $fieldInfo) {
                if ($fieldInfo->name !== 'id') {
                    echo "<td data-label='{$fieldInfo->name}'><input type='text' name='{$fieldInfo->name}[]' value=''></td>";
                }
            }
            echo "<td><button type='submit' name='aggiungi' value='aggiungi'>Aggiungi</button></td>";
            echo "<td></td>"; // Colonna vuota per il pulsante Elimina
            echo "</tr>";

            echo "</table>";
            echo "</form>";
        } else {
            echo "0 risultati nella tabella $table";
        }
    }

    // Visualizza le tabelle
    displayTable($conn, 'contatti');
    displayTable($conn, 'competenze');
    displayTable($conn, 'immagini');

    // Chiude la connessione al database
    $conn->close();
    ?>
</body>
</html>