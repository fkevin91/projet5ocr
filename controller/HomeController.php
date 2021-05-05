<?php
use Twig\Environment;
include '../vendor/autoload.php';
// on inclus le modele
include '../model/Model.php';
include '../model/Accueil.php';

class HomeController{
    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    public function displayHome(){
        try {
            // le dossier ou on trouve les templates
            //$loader = new Twig\Loader\FilesystemLoader('templates');
        
            // initialiser l'environement Twig
            //$twig = new Twig\Environment($loader);
        
            // load template
            $template = $this->twig->load('index.html.twig');
        
            // on va instancier le modele
            // et préparer les variables
            // qu'on va passer au template
            //require_once("../model/modele.php");
            $home = new App\models\Accueil();
            $infoAccueils = $home->get_home_by_id(0);
            $titre = "Accueil";
            // render template
            if (!empty($infoAccueils)){
                echo $template->render(array(
                    'titre' => $titre,
                    'infoAccueils' => $infoAccueils,
                    'post' => $_POST
                ));
                
            }else{
                $infoAccueils = [
                    'idinfAccueil' =>'0',
                    'nom' =>'0',
                    'prenom' =>'0',
                    'phrase_accroche' =>'0',
                    'github' =>'0',
                    'twitter' =>'0',
                    'linkedin' =>'0'
                ];
                echo $template->render(array(
                    'titre' => 'erreur',
                    'infoAccueils' => $infoAccueils,
                ));
            }
        
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

}