<?php
require_once '../vendor/autoload.php';

//creation d'un tableau des routes
$arrayPage = array('post', 'home', 'cv', 'listpost', 'contact');


$loader = new \Twig\Loader\FilesystemLoader('../view');
$twig = new \Twig\Environment($loader, [
]);

//on recupere ce qui se trouve apres le */*
if (!empty($_GET['url'])){
    $post = $_GET['url'];
}
else {
    $post = 'home';
}

if (in_array($post, $arrayPage)) {
    //recupération de l'url et on y ajoute le nom controller
    $className = $post . 'Controller';
    //on appelle le controller correspondant
    include_once '../controller/'  . $className . '.php';
    //on prend le loader
    $twig = new \Twig\Environment($loader);
    //création de l'objet "controller"
    $controller = new $className($twig);
    //appelle de la fonction "allPost()" qui rend la page html.twig
    switch ($post) {
        case 'post':
            //if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->displayPost();
            //}
            //else {
                //echo 'Erreur : aucun identifiant de billet envoyé';
            //}
            break;
        case 'home':
            $controller->displayHome();
            break;
        case 'cv':
            $controller->displayCV();
            break;        
        case 'listpost':
            $controller->displayListPost();
            break;
    }
}
else {
    $post = 'home';
    include_once '../controller/HomeController.php';
    $twig = new \Twig\Environment($loader);
    $controller = new HomeController($twig);
    $controller->displayHome();
}