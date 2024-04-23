<section>
  <div class="container5">
    <!-- Contenuto del sito -->
  </div>

  <div class="footer5">
    <svg class="wave-svg" viewBox="0 0 1200 50" fill="none" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" style="stop-color:#68bd7a;stop-opacity:1" />
        <stop offset="100%" style="stop-color:#bdb368;stop-opacity:1" />
        </linearGradient>
    </defs>
    <?php
        $num_lines = 20; // Numero di linee parallele
        $amplitude = 40; // Ampiezza dell'onda
        $period = 300; // Periodo dell'onda
        $x_end = 1300; // Posizione x di fine delle linee
        $y_start = 40; // Altezza di partenza delle linee
        $y_end = 10; // Altezza di fine delle linee
        $line_spacing = 13; // Spazio tra le linee

        for ($i = 0; $i < $num_lines; $i++) {
        $phase = ($i / $num_lines) * (2 * M_PI); // Fase dell'onda per ogni linea
        $y1 = $y_start - $amplitude * sin(($i / $num_lines) * (2 * M_PI * $period) + $phase);
        $y2 = $y_end + ($y_start - $y1) + $i * $line_spacing;
        echo "<line x1='0' y1='$y1' x2='$x_end' y2='$y2' stroke='url(#gradient)' stroke-width='2'/>";
        }
    ?>
    </svg>
  </div>
</section>
