<?php
//Connecting sa database

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_NAME", "reservation");
    define("DB_PASS", "");

    try{

        $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . ". <br>";
    }
