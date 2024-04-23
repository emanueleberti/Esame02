
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="scss02.css">
  <title>project</title>
</head>
<body>
    
    <!--Intestazione-->
    <?php
        require_once( 'intestazione.php' );
        require_once("connessione.php");
    ?>

    
    
    <?php 
        
        // ID desiderato dall'URL
        $desiredId = isset($_GET['id']) ? $_GET['id'] : null;

        // Query per ottenere i dati dell'immagine desiderata
        $sql = "SELECT * FROM immagini WHERE id = $desiredId";
        $result = $conn->query($sql);
        

        // Verifica se sono presenti risultati
        if ($result->num_rows > 0) {
            // Attraversa i risultati per generare la sezione del progetto
            while($row = $result->fetch_assoc()) {
                // Apertura della sezione progetto
                echo '<section>';
                echo '<div class="container">';
                
                // Immagine sito
                echo '<img src="' . $row['src'] . '" alt="' . $row['alt'] . '">';

                // Altri dettagli del progetto
                echo '<div class="content">';
                
                // Sottotitolo del progetto
                echo '<h3>' . $row['subtitle'] . '</h3>';
                
                // Titolo del progetto
                echo '<h1>' . $row['title'] . '</h1>';
                
                // Descrizione del progetto
                echo '<p>' . $row['description'] . '</p>';
                
                echo '</div>'; // Chiudere il div della classe content

                // Chiusura della sezione progetto
                echo '</div>'; // Chiudere il div della classe container
                echo '</section>';
            }
        } else {
            echo "Nessun risultato trovato";
        }

    ?>

    
    <?php
        require_once( 'form.php' );
    ?>
    
</body>