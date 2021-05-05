<?php
require_once '../vendor/autoload.php';
session_start();
var_dump($_SESSION);
//creation d'un tableau des routes
$arrayPage = array(
    'post', 
    'home', 
    'listpost', 
    'contact', 
    'log',
    'registration', 
    'form',
    'homeback',
);

$arrayPageSecure = array(
    'homeback',
    'homebackAdd',
    'homebackList',
    'homebackUpdate',
    'homebackCommentValid',
);


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
    $className = ucfirst($post) . 'Controller';
    //on appelle le controller correspondant
    include '../controller/'  . $className . '.php';
    //on prend le loader
    $twig = new \Twig\Environment($loader);
    //création de l'objet "controller"
    $controller = new $className($twig);
    //appelle de la fonction "allPost()" qui rend la page html.twig
    switch ($post) {
        case 'post':
            if (isset($_GET['idblogpost']) && $_GET['idblogpost'] >= 0) {
                $controller->displayPost($_GET['idblogpost']);
            }
            else {
                echo 'Erreur : aucun id reconnu';
            }
            break;
        case 'home':
            if (!empty($_GET['log']) && $_GET['log'] == 'false') {
                session_destroy();
                $controller->displayHome();
            }
            else {
                $controller->displayHome();
            }
            break;       
        case 'listpost':
            $controller->displayListPost();
            break;        
        case 'contact':
            $controller->displayContact();
            break;
        case 'log':
            $controller->displayLog();
            break;
        case 'registration':
            $controller->displayRegistration();
            break;
        case 'form':
            if (!empty($_POST['formulaire'])){
                $controller->recuperation_du_formulaire($_POST, $_SESSION);
            }else{
                header('location:../public/home');
            }
            break;
        case 'homeback':
            if(!empty($_SESSION['Auth']['login']) && !empty($_SESSION['Auth']['pass'])){
                if (!empty($_GET['back']) && in_array($_GET['back'], $arrayPageSecure)) {
                    $back = $_GET['back'];
                    switch ($back) {
                        case 'homeback':
                            $controller->displayHomeBack();
                            break;
                        case 'homebackAdd':
                            $controller->displayBackAddPost();
                            break;
                        case 'homebackList':
                            $controller->displayBackListPost();
                            break;
                        case 'homebackUpdate':
                                $controller->displayBackUpdatePost();
                            break;
                        case 'homebackCommentValid':
                            // a faire !!!!
                            $controller->displayHomeBack();
                            break;
                    }
                }
                else {
                    header('location:../public/home');
                }
            }else{
                header('location:../public/home');
            }
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