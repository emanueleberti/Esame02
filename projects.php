<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="scss.css">
  <title>Projects</title>
</head>
<body>
    
    <!--Intestazione-->
    <?php
        require_once( 'intestazione.php' );
        require_once("connessione.php");
    ?>
    
    <!--Immagine e titolo-->
    <main>
        <!--immagine-->
        <div class="main-content">
          <img src="IMMAGINI/SFONDO2.jpg" alt="Sfondo">
          <!--Titolo-->
        </div>
    </main>

    <!--Progetti-->  
    <section>
        <div class="image-grid">
              
            <?php 
                 // Query per ottenere i dati dal database
                $sql = "SELECT * FROM immagini";
                $result = $conn->query($sql);

                // Verifica se sono presenti risultati
                if ($result->num_rows > 0) {
                    // Attraversa i risultati per generare dinamicamente le immagini
                    while($row = $result->fetch_assoc()) {
                        echo '<a href="' . $row['link'] . '?id=' . $row['id'] . '">';
                        echo '<img src="' . $row['src'] . '" alt="' . $row['alt'] . '" style="width: 100%;">';
                        echo '</a>';
                    }
                } else {
                    echo '<p class="errore">Nessun risultato trovato nel database</p>';
                }
            ?>
        </div>
    </section>

   
    <?php
        require_once( 'form.php' );
    ?>
    
</body>