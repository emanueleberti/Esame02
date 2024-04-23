<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="scss.css">
    <title>index</title>
</head>

<body>
  
  <!--Intestazione-->
  <?php
    require_once( 'intestazione.php' );
    require_once("connessione.php");
  ?>


  
  <!--Titolo-->
  <main>
    <!--immagine-->
    <div class="main-content">
      <img src="IMMAGINI/SFONFO.jpg" alt="Sfondo della prima pagina">
      <!--Titolo-->
      <div class="text-content">
          <h1>I'm Emanuele a graphic and web developer</h1>
      </div>
    </div>
  </main>
  
  
  <!--Competenze-->
  <section1>
    <h1 class="page-title">COSA POSSO FARE PER TE</h1>
    <p class="page-paragraph">Come web developer con esperienza in HTML, CSS, PHP, JavaScript, Photoshop e Figma, posso trasformare idee in siti web funzionali e coinvolgenti, curando ogni dettaglio visivo e tecnico per offrire esperienze digitali memorabili e intuitive.</p>
    <div class="competenze">
      <?php

        $sql = "SELECT * FROM competenze";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $width = $row['percentuale'] . '%';
                echo '<div class="skill">';
                echo '<div class="percentage-bar" style="width: ' . $width . '; background-color: ' . $row['colore'] . ';"></div>'; // Barra di percentuale
                echo '<img src="' . $row['immagine'] . '" alt="' . $row['titolo'] . '">';
                echo '<h2>' . $row['titolo'] . '</h2>';
                echo '<p>' . $row['descrizione'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Nessuna competenza trovata.</p>';
        }
      ?>
    </div>
  </section1>

  <?php
    require_once( 'decorazione.php');
  ?>

  <!--Progetti-->
  <section>
    <!--Titolo seconda pagina-->
    <a href="projects.php" class="pulsante-link"> <b>I MIEI PROGETTI</b></a>
    <!-- Contenitore delle immagini -->
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
  
  <!--Descrizione-->
  <section>
    <div class="container">
      <img src="IMMAGINI/voltoblack.jpg" alt="La mia foto">
      <div class="content">
        <!--WEB Developer-->
        <h3>WEB DEVELOPER</h3>
        <!--Titolo-->
        <h1>EMANUELE BERTI</h1>
        <!--Descrizione-->
        <p>Sono un programmatore web appassionato con esperienza 
          in HTML, CSS, SASS, PHP e altri linguaggi di sviluppo web. 
          Mi dedico alla creazione di soluzioni web innovative e 
          user-friendly.</p>
        <!--Recapiti-->
        <div>
          <p><b>Recapiti:</b></p>
          <p>emanuele.berti2002@gmail.com</p>
          <p>+39 3500345448</p>
          <p>Via del giogo 4/D, Fi</p>
        </div>
      </div>
    </div>
  </section>
  
  <!--Form-->
  <?php
    require_once( 'form.php' ); 
  ?>
  
</body>
</html>