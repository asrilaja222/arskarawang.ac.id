CREATE TABLE adminstrasi (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    kelas VARCHAR(10) NOT NULL,
    jumlah DECIMAL(10,2) NOT NULL,
    tanggal_pembayaran DATE NOT NULL
);
