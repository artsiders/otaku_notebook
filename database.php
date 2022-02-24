<?php
$pdo = new PDO("mysql:host=localhost;", "root", "");
$sql = "CREATE DATABASE if not exists note_book;
USE note_book;
CREATE TABLE `list_mangas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `state` varchar(40) NOT NULL,
  `note` varchar(10) NOT NULL,
  `valuation` varchar(50) NOT NULL,
  `image_name` varchar(200) NOT NULL DEFAULT 'Default.png'
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name_profil` varchar(200) NOT NULL DEFAULT 'default_profil.png',
  `email` varchar(200) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `sexe` varchar(20) NOT NULL
);
";
$query = $pdo->prepare($sql);
$query->execute();
