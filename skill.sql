CREATE TABLE competenze (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titolo VARCHAR(255) NOT NULL,
    percentuale VARCHAR(10) NOT NULL,
    colore VARCHAR(20) NOT NULL,
    descrizione TEXT NOT NULL,
    immagine VARCHAR(255) NOT NULL  
);

INSERT INTO competenze (titolo, descrizione, immagine, percentuale, colore) VALUES 
('HTML-CSS', 'Descrizione della competenza 1.', 'IMMAGINI/html.png', 70, '#ff0000'),
('PHP-JAVASCRIPT', 'Descrizione della competenza 2.', 'IMMAGINI/js.png', 50, '#00ff00'),
('PHOTOSHOP', 'Descrizione della competenza 3.', 'IMMAGINI/ph.png', 90, '#0000ff'),
('FIGMA', 'Descrizione della competenza 4.', 'IMMAGINI/fg.png', 80, '#ffff00');

DELETE FROM competenze;

DROP TABLE competenze;