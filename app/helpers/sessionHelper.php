<?php
// Démarre une nouvelle session.
session_start();

function isLoggedIn()
{
    // On vérifie si l'utilisateur est enregistré dans le tableau des sessions.
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }   
}