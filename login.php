<loginbackend>

    <?php
    session_start();
    include 'connessione.php'; // Connessione al database

    // Variabile per memorizzare i messaggi di errore
    $error_message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST['user']);
        $password = trim($_POST['pass']);

        // Prepara una dichiarazione SQL per prevenire SQL injection
        if ($stmt = $conn->prepare("SELECT id, password FROM login WHERE username = ?")) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    // Credenziali corrette
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    echo '<meta http-equiv="refresh" content="0;url=backend.php">';
                    exit; // Assicurati di terminare lo script dopo il reindirizzamento
                } else {
                    $error_message = "Password errata.";
                }
            } else {
                $error_message = "Nessun utente trovato con questo username.";
                    
            }
            $stmt->close();
        } else {
            $error_message = "Errore di connessione al database.";
        }
    }

    ?>
    <div class="login-page">
        
        <form  method="post" class="login-container" id="login">
            
            <label for="user" class="label">Username area riservata:</label>
            <input type="text" id="user" name="user" class="input" required>
            <br>
            <label for="pass" class="label">Password area riservata:</label>
            <input type="password" id="pass" name="pass" class="input" required>
            <br>
            <input type="submit" value="Login" class="button">
            <?php if (!empty($error_message)): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
    </div>

</loginbackend>
