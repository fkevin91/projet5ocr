<?php
namespace App\Controller;


class HomeController extends Controller{
    public function displayHome(){
        try {
            $template = $this->twig->load('index.html.twig');
            echo $template->render(array());
        } catch (\Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}