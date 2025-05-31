-- Buat database
CREATE DATABASE IF NOT EXISTS pemesanan_makanan;
USE pemesanan_makanan;

-- Buat tabel menu
CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    kantin VARCHAR(100) NOT NULL
);

INSERT INTO menu (nama, harga, stok, gambar, kantin) VALUES
('Nasi Goreng', 15000, 25, 'assets/nasgors.jpg', 'Kantin Ibu Rika'),
('Es Teh', 5000, 50, 'assets/esteh.jpeg', 'Kantin Ibu Rika'),
('Batagor', 12000, 10, 'assets/batagor.jpeg', 'Kantin Batagor Mas Riki'),
('Siomay', 10000, 15, 'assets/somay.webp', 'Kantin Batagor Mas Riki'),
('Bakso', 12000, 13, 'assets/bakso.jpg', 'Kantin Masakan Rumah Bu Eka'),
('Mie Ayam', 14000, 10, 'assets/bakmi.jpeg', 'Kantin Masakan Rumah Bu Eka');

