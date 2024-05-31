
<loginbackend>

    <?php
    session_start();
    include 'connessione.php'; // Connessione al database

    // Variabili per memorizzare i dati del form e i messaggi di errore
    $usr = $pwd = "";
    $errore_username = $errore_password = $error_message = '';

    // Verifica se il form è stato inviato
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verifica e sanitizzazione dell'input
        if (empty(trim($_POST["username"]))) {
            $errore_username = "Inserisci un nome utente.";
        } else {
            $username = htmlspecialchars(trim($_POST["usr"]));
        }

        if (empty(trim($_POST["password"]))) {
            $errore_password = "Inserisci una password.";
        } else {
            $password = htmlspecialchars(trim($_POST["password"]));
        }

        // Se non ci sono errori, procede con l'autenticazione
        if (empty($errore_username) && empty($errore_password)) {
            // Prepara una dichiarazione SQL per prevenire SQL injection
            if ($stmt = $conn->prepare("SELECT id, password FROM login WHERE username = ?")) {
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $hashed_password);
                    $stmt->fetch();

                    if (password_verify($pwd, $hashed_password)) {
                        // Credenziali corrette
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['username'] = $username;
                        header("Location: backend.php");
                        exit; // Assicurati di terminare lo script dopo il reindirizzamento
                    } else {
                        $error_message = "Password errata.";
                    }
                } else {
                    $error_message = "Nessun utente trovato con questo nome utente.";
                }
                $stmt->close();
            } else {
                $error_message = "Errore di connessione al database.";
            }
        }
    }
   
    ?>


    <div class="loginbackend">
        <myform action="login.php" method="post" class="login-container">
            <mylabel for="usr" class="my-label">Nome utente:</mylabel>
            <myinput type="text" id="usr" name="usr" class="my-input" value="<?php echo htmlspecialchars($username); ?>" required>
            <span class="errore"><?php echo $errore_username; ?></span>
            <br>
            <mylabel for="pwd" class="my-label">Parola d'ordine:</mylabel>
            <myinput type="password" id="pwd" name="pwd" class="my-input" value="<?php echo htmlspecialchars($password); ?>" required>
            <span class="errore"><?php echo $errore_password; ?></span>
            <br>
            <mysubmit type="submit" value="Accedi" class="my-button">
            <?php if (!empty($error_message)): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </myform>
    </div>


</loginbackend>