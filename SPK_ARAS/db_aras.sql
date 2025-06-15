CREATE DATABASE db_aras;
USE db_aras;
DROP DATABASE db_aras

CREATE TABLE alternatif (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50),
  processor INT,
  ram INT,
  strg INT,
  layar INT,
  harga INT
);

CREATE TABLE bobot (
  kriteria VARCHAR(50) PRIMARY KEY,
  sifat VARCHAR(50), -- Benefit / Cost
  nilai FLOAT
);

CREATE TABLE hasil_akhir (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50),
    skor FLOAT,
    preferensi FLOAT,
    ranking INT
);
DROP TABLE hasil_akhir

INSERT INTO alternatif (nama, processor, ram, strg, layar, harga) VALUES
('A1', 3, 3, 3, 5, 3),
('A2', 2, 3, 4, 3, 3),
('A3', 2, 3, 4, 3, 2),
('A4', 2, 3, 4, 3, 3),
('A5', 2, 2, 3, 5, 1),
('A6', 3, 3, 3, 5, 3),
('A7', 3, 3, 3, 5, 4),
('A8', 4, 5, 5, 5, 5),
('A9', 2, 3, 3, 5, 2),
('A10', 2, 3, 3, 5, 2),
('A11', 3, 3, 3, 5, 4),
('A12', 2, 3, 4, 3, 5),
('A13', 2, 3, 4, 3, 4),
('A14', 2, 3, 4, 3, 4),
('A15', 2, 2, 3, 5, 3),
('A16', 3, 3, 3, 5, 4),
('A17', 3, 3, 3, 5, 1),
('A18', 4, 5, 5, 5, 4),
('A19', 2, 3, 3, 5, 4),
('A20', 2, 3, 3, 5, 3),
('A21', 2, 2, 5, 3, 2),
('A22', 4, 3, 5, 5, 4),
('A23', 2, 3, 4, 5, 3),
('A24', 5, 5, 5, 5, 4),
('A25', 2, 3, 5, 5, 3),
('A26', 3, 3, 4, 5, 4),
('A27', 3, 3, 3, 5, 4),
('A28', 3, 3, 4, 3, 3),
('A29', 3, 3, 3, 5, 4),
('A30', 2, 2, 4, 5, 2),
('A31', 4, 3, 5, 5, 5),
('A32', 3, 5, 4, 2, 5),
('A33', 3, 3, 4, 5, 4),
('A34', 3, 3, 4, 5, 4),
('A35', 2, 3, 4, 3, 4),
('A36', 4, 3, 5, 3, 3),
('A37', 3, 3, 4, 3, 4),
('A38', 2, 3, 3, 5, 4),
('A39', 4, 3, 5, 5, 3),
('A40', 2, 5, 4, 5, 5),
('A41', 3, 1, 4, 5, 2),
('A42', 4, 5, 4, 3, 5),
('A43', 3, 5, 4, 3, 5),
('A44', 2, 3, 3, 2, 4),
('A45', 2, 1, 3, 3, 1),
('A46', 1, 1, 3, 3, 2),
('A47', 2, 1, 4, 5, 1),
('A48', 3, 3, 4, 3, 3),
('A49', 2, 3, 3, 5, 4),
('A50', 3, 1, 4, 3, 2);

INSERT INTO bobot (kriteria, sifat, nilai) VALUES
('processor', 'Benefit', 0.25),
('ram', 'Benefit', 0.2),
('strg', 'Benefit', 0.15),
('layar', 'Benefit', 0.1),
('harga', 'Cost',    0.3);

DROP TABLE bobot

