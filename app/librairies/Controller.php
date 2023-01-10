<?php
/**
 * Charger les modèles et les vues
 */
class Controller {
    public function model($model)
    {
        if (file_exists('../app/models/' . $model . '.php')) {
            require_once '../app/models/' . $model . '.php';
            // Instancie le model
            return new $model();
        } else {
            die("Model does not exists");
        }
    }

    //Appel de la methode: $this->model('Post');

    public function view($view)
    {
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die("View does not exists");
        }
    }
}