<?php
use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/Model.php';

class HomeController{
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayHome(){
        try {
            $template = $this->twig->load('index.html.twig');
            echo $template->render(array());
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}