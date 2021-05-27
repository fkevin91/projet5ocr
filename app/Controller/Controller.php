<?php
namespace App\Controller;

use Twig\Environment;

// On instancie une connexion

abstract class Controller {

    protected $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }
    
}