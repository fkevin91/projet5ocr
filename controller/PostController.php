<?php

use Twig\Environment;

class PostController {

    private $twig;

    public function __construct(Environment $twig) {
        $this->twig = $twig;
    }

    public function displayPost() {

        echo $this->twig->render('post.html.twig', ['name' => 'Fabien']);

    }
}