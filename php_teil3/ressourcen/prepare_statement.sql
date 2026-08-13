CREATE TABLE links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(200) NOT NULL,
    url VARCHAR(500) NOT NULL
);

INSERT INTO links (titel, url)
VALUES
    ('PHP', 'https://www.php.net'),
    ('MDN', 'https://developer.mozilla.org'),
    ('W3C', 'https://www.w3.org');
