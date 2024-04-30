<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="scss.css">
      <title>index</title>
  </head>

  <body>
    
    <?php
      require_once("connessione.php"); // Carica il file di connessione al database
    ?>

    <!-- Intestazione -->
    <?php
      require_once( 'intestazione.php' ); // Carica il file intestazione.php
    ?>

    
    <!-- Titolo -->
    <main>
      <!-- Immagine di sfondo -->
      <div class="main-content">
        <img src="IMMAGINI/SFONFO.jpg" alt="Sfondo della prima pagina">
        <!-- Titolo -->
        <div class="text-content">
            <h1>I'm Emanuele a graphic and web developer</h1>
        </div>
      </div>
    </main>
    
    
    <!-- Competenze -->
    <section1>
      <!-- Titolo delle competenze -->
      <h1 class="page-title">COSA POSSO FARE PER TE</h1>
      <!-- Paragrafo delle competenze -->
      <p class="page-paragraph">Come web developer con esperienza in HTML, CSS, PHP, JavaScript, Photoshop e Figma, posso trasformare idee in siti web funzionali e coinvolgenti, curando ogni dettaglio visivo e tecnico per offrire esperienze digitali memorabili e intuitive.</p>
      <!-- Contenitore delle competenze -->
      <div class="competenze">
        <?php

          $sql = "SELECT * FROM competenze"; // Query per selezionare le competenze dal database
          $result = $conn->query($sql); // Esegue la query sul database

          // Verifica se ci sono risultati
          if ($result->num_rows > 0) {
              // Attraversa i risultati e mostra le competenze
              while($row = $result->fetch_assoc()) {
                  echo '<div class="skill">';
                  echo '<img src="' . $row['immagine'] . '" alt="' . $row['titolo'] . '">';
                  echo '<h2>' . $row['titolo'] . '</h2>';
                  echo '<p>' . $row['descrizione'] . '</p>';
                  echo '</div>';
              }
          } else {
              echo '<p>Nessuna competenza trovata.</p>'; // Mostra un messaggio se non ci sono competenze nel database
          }
        ?>
      </div>
    </section1>

    <?php
      require_once( 'decorazione.php'); // Carica il file decorazione.php
    ?>

    <!-- Progetti -->
    <section>
      <!-- Titolo dei progetti -->
      <a href="projects.php" class="pulsante-link"> <b>I MIEI PROGETTI</b></a>
      <!-- Contenitore delle immagini dei progetti -->
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
            echo '<p class="errore">Nessun risultato trovato nel database</p>'; // Mostra un messaggio se non ci sono risultati nel database
        }
        
        ?>
      </div>
    </section>
    
    <!-- Descrizione -->
    <section>
      <div class="container">
        <!-- Immagine personale -->
        <img src="IMMAGINI/voltoblack.jpg" alt="La mia foto">
        <div class="content">
          <!-- Titolo del lavoro -->
          <h3>WEB DEVELOPER</h3>
          <!-- Nome -->
          <h1>EMANUELE BERTI</h1>
          <!-- Descrizione -->
          <p>Sono un programmatore web appassionato con esperienza 
            in HTML, CSS, SASS, PHP e altri linguaggi di sviluppo web. 
            Mi dedico alla creazione di soluzioni web innovative e 
            user-friendly.</p>
          <!-- Recapiti -->
          <div>
            <p><b>Recapiti:</b></p>
            <p>emanuele.berti2002@gmail.com</p>
            <p>+39 3500345448</p>
            <p>Via del giogo 4/D, Fi</p>
          </div>
        </div>
      </div>
    </section>

    
    <!-- Form -->
    <?php
      require_once( 'form.php' ); // Carica il file form.php
    ?>
    
  </body>
</html>