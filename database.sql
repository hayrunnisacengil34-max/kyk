-- SQL code to create kyk_otomasyon database
CREATE DATABASE kyk_otomasyon;

USE kyk_otomasyon;

-- Table for storing student information
CREATE TABLE ogrenciler (
    ogrenci_id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    soyad VARCHAR(50) NOT NULL,
    tc_kimlik_no VARCHAR(11) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefon VARCHAR(15),
    kayit_tarihi DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table for tracking entry and exit
CREATE TABLE girisCikis (
    giris_cikis_id INT AUTO_INCREMENT PRIMARY KEY,
    ogrenci_id INT NOT NULL,
    tarih DATETIME DEFAULT CURRENT_TIMESTAMP,
    durum ENUM('Giriş', 'Çıkış') NOT NULL,
    FOREIGN KEY (ogrenci_id) REFERENCES ogrenciler(ogrenci_id)
);

-- Table for storing admin login information
CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    kullanici_adi VARCHAR(50) UNIQUE NOT NULL,
    sifre VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    olusturma_tarihi DATETIME DEFAULT CURRENT_TIMESTAMP
);