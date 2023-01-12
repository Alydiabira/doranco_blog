<?php
/**
 * Gère les URLs & Chargement des controlleurs
 */
class Core
{
    // Propriétées
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->getUrl(); // ['post', 'create']

        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]); // http://localhost/daranco/post - User or Post.
            unset($url[0]); // Optionnel mais fait partie des bonnes pratiques.
        }

        // Requiert le controlleur.
        require_once '../app/controllers/' . $this->currentController . '.php';
        // require_once '../app/controllers/Post.php';
        // require_once '../app/controllers/User.php';

        // Instancie la classe du controlleur.
        $this->currentController = new $this->currentController;
        // $this->currentController = new Post;

        if (isset($url[1])) {
            // Verifie si la méthode existe dans le controlleur.
            if (method_exists($this->currentController, $url[1])) { // http://localhost/daranco/post/create.
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // Récupérer les paramètres.
        $this->params = $url ? array_values($url) : [];

        // Appel un callback avec un tableau de paramètre
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params); // Permet de récuperer les paramètres dans un tableau
    }

    /**
     * Récupère l'URL courant
     */
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url= rtrim($_GET['url'], '/'); // Supprimer le /
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); // ['post', 'create']

            return $url; // retourne ['post', 'create']
        }
    }

    // isset(); // il verifier si une variable est déclarer et que sa valeur n'est pas égal à NULL.
    // empty(); // il verifier si une variable est vide ou pas.
    // $_GET => elle donne les valeurs des informations indiquées dans l'url
    // rtrim() supprime les espaces vides en fin de chaine de caractère
    // filter_var() permet de filtré une variable avec un filtre specifique.
    // ucwords // met la premiere lettre en majuscule.
    // unset() sert à détruire une variable.
    // array_values sert à retourner toutes les valeurs d'un tableau
}