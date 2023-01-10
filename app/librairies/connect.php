<?php

// Connect to the database
try { // Essayer
    $connect = new PDO(
        'mysql:host=localhost;dbname=doranco_blog;charset=utf8_unicode_520_ci',
        'root',
        'root'
    );

    echo "Connect";
} catch (Exception $e) { // Capturer
    die('Erreur :' . $e->getMessage());
}