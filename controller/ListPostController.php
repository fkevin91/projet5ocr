<?php

use Twig\Environment;

class ListPostController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function displayListPost() {

        echo $this->twig->render('listpost.html.twig', ['name' => 'Kévin']);

    }
}