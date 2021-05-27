<?php
require_once '../vendor/autoload.php';
require_once '../app/controller/Controller.php';
session_start();
$arrayPage = array(
    'post', 
    'home', 
    'contact', 
    'user',
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
    $className = 'App\\Controller\\' . ucfirst($post) . 'Controller';
    $classFile = ucfirst($post) . 'Controller';
    //on appelle le controller correspondant
    include '../app/controller/'  . $classFile . '.php';
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
                $controller->displayListPost();
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
        case 'contact':
            $controller->displayContact();
            break;
        case 'user':
            if (isset($_GET['user']) && $_GET['user'] == 1) {
                $controller->displayLog();
            }
            if (isset($_GET['user']) && $_GET['user'] == 2) {
                $controller->displayRegistration();
            }
            break;
        case 'form':
            if (!empty($_POST['formulaire'])){
                $controller->recuperation_du_formulaire($_POST);
            }else{
                header('location:../public/home');
            }
            break;
        case 'homeback':
            if(!empty($_SESSION['Auth']['pseudo']) && !empty($_SESSION['Auth']['iduser'])){
                if (!empty($_GET['back']) && in_array($_GET['back'], $arrayPageSecure)) {
                    $back = $_GET['back'];
                    switch ($back) {
                        case 'homeback':
                            $controller->displayHomeBack();
                            // ok
                            break;
                        case 'homebackAdd':
                            $controller->displayBackAddPost();
                            // ok
                            break;
                        case 'homebackList':
                            $controller->displayBackListPost($_SESSION);
                            break;
                        case 'homebackUpdate':
                            if (isset($_GET['idblogpost']) && $_GET['idblogpost'] >= 0) {
                                $controller->displayBackUpdatePost($_GET['idblogpost']);
                            }
                            else {
                                header('location:../public/homeback?back=homebackList');
                                //$controller->displayBackListPost();
                            }
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
    include_once '../app/controller/HomeController.php';
    $twig = new \Twig\Environment($loader);
    $controller = new \App\Controller\HomeController($twig);
    $controller->displayHome();
}