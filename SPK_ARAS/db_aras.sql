CREATE DATABASE db_aras;
USE db_aras;
DROP DATABASE db_aras

CREATE TABLE alternatif (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50),
  processor INT,
  ram INT,
  tipe_storage INT,
  kapasitas_storage INT,
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

INSERT INTO alternatif (nama, processor, ram, tipe_storage, kapasitas_storage, harga) VALUES
('A1', 4, 4, 3, 5, 4),
('A2', 3, 4, 5, 3, 4),
('A3', 1, 4, 5, 3, 3),
('A4', 3, 4, 5, 3, 4),
('A5', 1, 2, 3, 5, 3),
('A6', 4, 4, 3, 5, 4),
('A7', 4, 4, 3, 5, 4),
('A8', 5, 5, 4, 5, 5),
('A9', 3, 4, 3, 5, 4),
('A10', 3, 4, 3, 5, 4),
('A11', 4, 4, 5, 4, 5),
('A12', 5, 5, 4, 5, 5),
('A13', 5, 4, 5, 4, 5),
('A14', 3, 4, 5, 4, 4),
('A15', 3, 4, 3, 5, 4),
('A16', 4, 4, 5, 4, 5),
('A17', 2, 2, 5, 4, 1),
('A18', 4, 4, 5, 4, 5),
('A19', 4, 4, 5, 4, 4),
('A20', 3, 4, 5, 3, 4),
('A21', 3, 2, 4, 5, 3),
('A22', 5, 4, 4, 5, 5),
('A23', 3, 4, 5, 4, 4),
('A24', 5, 5, 4, 5, 5),
('A25', 3, 4, 4, 5, 4),
('A26', 4, 4, 5, 4, 5),
('A27', 4, 4, 3, 5, 5),
('A28', 4, 4, 5, 4, 4),
('A29', 4, 4, 3, 5, 5),
('A30', 3, 2, 5, 3, 3),
('A31', 5, 4, 4, 5, 5),
('A32', 4, 5, 5, 4, 5),
('A33', 4, 4, 5, 4, 5),
('A34', 4, 4, 5, 4, 5),
('A35', 3, 4, 5, 3, 5),
('A36', 4, 4, 4, 5, 4),
('A37', 4, 4, 5, 4, 5),
('A38', 3, 4, 3, 5, 4),
('A39', 5, 4, 4, 5, 4),
('A40', 3, 5, 5, 4, 5),
('A41', 4, 2, 5, 4, 4),
('A42', 5, 5, 5, 3, 5),
('A43', 4, 5, 5, 4, 5),
('A44', 3, 4, 3, 5, 5),
('A45', 3, 2, 3, 5, 3),
('A46', 2, 2, 3, 5, 4),
('A47', 3, 2, 5, 4, 2),
('A48', 4, 4, 5, 4, 4),
('A49', 3, 4, 3, 5, 5),
('A50', 4, 2, 5, 4, 3);


INSERT INTO bobot (kriteria, sifat, nilai) VALUES
('processor', 'Benefit', 0.2772),
('ram', 'Benefit', 0.2178),
('tipe_storage', 'Benefit', 0.1683),
('kapasitas_storage', 'Benefit', 0.1683),
('harga', 'Cost',    0.1683);

DROP TABLE bobot

