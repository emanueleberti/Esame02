-- Crea la tabella per immagini
CREATE TABLE immagini (
    id INT AUTO_INCREMENT PRIMARY KEY,
    src VARCHAR(255) NOT NULL,
    alt VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);

-- Inserisci i dati nel database
INSERT INTO immagini (src, alt, link, title, subtitle, description) VALUES 
('IMMAGINI/01.jpg', 'Descrizione immagine 1', 'progetto.php', 'TITOLO', 'SITO WEB', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatum adipisci harum repudiandae deleniti in laboriosam ducimus debitis voluptatibus. Accusantium, tempora? Aliquid voluptatibus modi inventore nihil, ullam fugit asperiores repudiandae!'),
('IMMAGINI/02.jpg', 'Descrizione immagine 2', 'progetto.php', 'TITOLO', 'SITO WEB', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatum adipisci harum repudiandae deleniti in laboriosam ducimus debitis voluptatibus. Accusantium, tempora? Aliquid voluptatibus modi inventore nihil, ullam fugit asperiores repudiandae!'),
('IMMAGINI/03.jpg', 'Descrizione immagine 3', 'progetto.php', 'TITOLO', 'SITO WEB', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatum adipisci harum repudiandae deleniti in laboriosam ducimus debitis voluptatibus. Accusantium, tempora? Aliquid voluptatibus modi inventore nihil, ullam fugit asperiores repudiandae!'),
('IMMAGINI/04.jpg', 'Descrizione immagine 4', 'progetto.php', 'TITOLO', 'SITO WEB', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatum adipisci harum repudiandae deleniti in laboriosam ducimus debitis voluptatibus. Accusantium, tempora? Aliquid voluptatibus modi inventore nihil, ullam fugit asperiores repudiandae!');