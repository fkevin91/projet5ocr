<?php
use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/model.php';

class HomeBackController{
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayHomeBack(){
        try {
            //$loader = new Twig\Loader\FilesystemLoader('templates');
            //$twig = new Twig\Environment($loader);
            $template = $this->twig->load('backof.html.twig');
            // require_once("../model/modele.php");
            //$homeBack = new connectionBDD();
            // $infoAccueils = $homeBack->get_home_Back_by_id(0);
            $titre = "Accueil";
            // render template
                echo $template->render(array(
                    /*'titre' => $titre,
                    'infoAccueils' => $infoAccueils,
                    'post' => $_POST*/
                ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function displayBackAddPost(){
        try {
            //$loader = new Twig\Loader\FilesystemLoader('templates');
            //$twig = new Twig\Environment($loader);
            $template = $this->twig->load('backaddpost.html.twig');
            // require_once("../model/modele.php");
            //$homeBack = new connectionBDD();
            // $infoAccueils = $homeBack->get_home_Back_by_id(0);
            $titre = "Accueil";
            // render template
                echo $template->render(array(
                    /*'titre' => $titre,
                    'infoAccueils' => $infoAccueils,
                    'post' => $_POST*/
                ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function displayBackListPost(){
        try {
            //$loader = new Twig\Loader\FilesystemLoader('templates');
            //$twig = new Twig\Environment($loader);
            $template = $this->twig->load('backlistpost.html.twig');
            // require_once("../model/modele.php");
            //$homeBack = new connectionBDD();
            // $infoAccueils = $homeBack->get_home_Back_by_id(0);
            $titre = "Accueil";
            // render template
                echo $template->render(array(
                    /*'titre' => $titre,
                    'infoAccueils' => $infoAccueils,
                    'post' => $_POST*/
                ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function displayBackDelPost(){

    }

    public function displayBackUpdatePost(){
        try {
            //$loader = new Twig\Loader\FilesystemLoader('templates');
            //$twig = new Twig\Environment($loader);
            $template = $this->twig->load('backupdatepost.html.twig');
            // require_once("../model/modele.php");
            //$homeBack = new connectionBDD();
            // $infoAccueils = $homeBack->get_home_Back_by_id(0);
            $titre = "Accueil";
            // render template
                echo $template->render(array(
                    /*'titre' => $titre,
                    'infoAccueils' => $infoAccueils,
                    'post' => $_POST*/
                ));
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}